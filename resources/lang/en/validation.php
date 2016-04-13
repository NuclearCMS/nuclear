<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'email'                => 'The :attribute must be a valid email address.',
    'exists'               => 'The selected :attribute is invalid.',
    'filled'               => 'The :attribute field is required.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'url'                  => 'The :attribute format is invalid.',

    // Custom rule translations
    'unique_setting' => 'This setting key has already been taken.',
    'unique_setting_group' => 'This setting group key has already been taken.',
    'date_mysql' => 'Invalid date-time format.',
    'not_reserved_field' => 'This field name is reserved for Nuclear.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'title' => 'Title',
        'node_name' => 'Node Name',
        'email' => 'E-mail',
        'url' => 'URL',
        'text' => 'Text',
        'source' => 'Source',
        'alt' => 'Alternative Text',
        'password' => 'Password',
        'password_confirmation' => 'Password Confirmation',
        'keywords' => 'Keywords',
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'name' => 'Name',
        'label' => 'Label',
        'type' => 'Type',
        'key' => 'Key',
        'group' => 'Group',
        'role' => 'Role',
        'user' => 'User',
        'public_url' => 'Public URL',
        'absolute_path' => 'Absolute Path',
        'description' => 'Description',
        'visible' => 'Visible',
        'hides_children' => 'Hides Child Nodes',
        'color' => 'Color',
        'sterile' => 'Sterile',
        'home' => 'Homepage Node',
        'locked' => 'Locked',
        'status' => 'Status',
        'position' => 'Position',
        'rules' => 'Rules',
        'options' => 'Options',
        'content' => 'Content',
        'default_value' => 'Default Value',
        'published_at' => 'Publish Date',
        'created_at' => 'Creation Date',
        'updated_at' => 'Updated Date',
        'priority' => 'Priority',
        'children_order' => 'Children Order',
        'children_order_direction' => 'Children Order Direction',
        'children_display_mode' => 'Children Display Mode',
        'meta_title' => 'Meta Title',
        'meta_keywords' => 'Meta Keywords',
        'meta_description' => 'Meta Description',
        'meta_author' => 'Meta Author',
        'meta_image' => 'Meta Image',
        'locale' => 'Locale',
        'caption' => 'Caption',
        'taggable' => 'Taggable',
        'tags' => 'Tags',
        'image' => 'Image',
        'link' => 'Link',
        'cover' => 'Cover',

        // Settings specific
        'analytics' => 'Google Analytics Key',
        'site-title' => 'Site Title',
        'site-description' => 'Site Description',
        'site-author' => 'Site Author',
        'social-facebook-url' => 'Facebook URL',
        'social-twitter-username' => 'Twitter Username',
        'social-twitter-url' => 'Twitter URL',
        'social-instagram-url' => 'Instagram URL',
        'social-youtube-url' => 'Youtube URL',
    ],

];