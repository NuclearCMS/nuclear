<?php

namespace Reactor\Http\Controllers\Traits;


use Illuminate\Http\Request;
use Reactor\Nodes\Node;

trait UsesNodeHelpers {

    /**
     * Validates the node scope
     *
     * @param string $scope
     */
    protected function validateScope($scope)
    {
        if ( ! in_array($scope, [
            'not-published', 'locked', 'invisible',
            'published', 'draft', 'pending', 'archived'
        ])
        )
        {
            abort(404);
        }
    }

    /**
     * @param int $id
     * @param int $source
     * @param string $permission
     * @param bool $withSource
     * @return array
     */
    protected function authorizeAndFindNode($id, $source, $permission, $withSource = true)
    {
        $this->authorize($permission);

        $node = Node::findOrFail($id);

        if ( ! $withSource)
        {
            return $node;
        }

        list($locale, $source) = $this->determineLocaleAndSource($source, $node);

        return [$node, $locale, $source];
    }

    /**
     * Determines the current editing locale
     *
     * @param int|null $source
     * @param Node $node
     * @return string
     */
    protected function determineLocaleAndSource($source, Node $node)
    {
        if ($source)
        {
            $source = $node->translations->find($source);

            if (is_null($source))
            {
                abort(404);
            }
        } else
        {
            $source = $node->translate();

            if (is_null($source))
            {
                $source = $node->translations->first();
            }
        }

        return [$source->locale, $source];
    }

    /**
     * Validates if the parent can have children nodes
     *
     * @param Node $parent
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function validateParentCanHaveChildren(Node $parent = null)
    {
        if ($parent && $parent->sterile)
        {
            abort(500, 'Node is sterile.');
        }
    }

    /**
     * @param Request $request
     * @param int $id
     * @return static
     */
    protected function createNode(Request $request, $id)
    {
        $node = new Node;

        $node->setNodeTypeByKey($request->input('type'));

        $locale = $this->validateLocale($request, true);

        $node->fill([
            $locale => $request->all()
        ]);

        $node = $this->locateNodeInTree($id, $node);

        $node->save();

        return [$node, $locale];
    }

    /**
     * @param int $id
     * @param Node $node
     * @return mixed
     */
    protected function locateNodeInTree($id, Node $node)
    {
        if (is_null($id))
        {
            return $node->makeRoot();
        }

        $parent = Node::findOrFail($id);
        $node->appendTo($parent);

        return $node;
    }

    /**
     * Determines the node publishing
     *
     * @param Request $request
     * @param Node $node
     */
    protected function determinePublish(Request $request, Node $node)
    {
        if ($request->get('_publish') === 'publish')
        {
            $node->publish();
        }
    }

    /**
     * @param Request $request
     * @return array
     */
    protected function filterTimeInput(Request $request)
    {
        if (empty($request->input('published_at')))
        {
            return $request->except('published_at');
        }

        return $request->all();
    }

    /**
     * @param Request $request
     * @param int $id
     */
    protected function determineHomeNode(Request $request, $id)
    {
        if ($request->input('home') === '1')
        {
            $home = Node::whereHome(1)->where('id', '<>', $id)->first();

            if ($home)
            {
                $home->update(['home' => 0]);
            }
        }
    }

}