<?php

return Symfony\CS\Config\Config::create()
    ->level(Symfony\CS\FixerInterface::PSR2_LEVEL)
    ->fixers([
        'phpdoc_params',
        'phpdoc_indent',
        'phpdoc_no_access',
        'phpdoc_no_package',
        'phpdoc_scalar',
        'phpdoc_separation',
        'phpdoc_short_description',
        'phpdoc_to_comment',
        'phpdoc_trim',
        'phpdoc_type_to_var',
        'phpdoc_order',
        'operators_spaces',
        'ordered_use',
        'short_array_syntax',
        'return',
        'spaces_before_semicolon',
        'spaces_after_semicolon',
        'spaces_cast',
        'ternary_spaces',
        'eof_ending',
        'concat_with_spaces',
        'multiline_array_trailing_comma',
        'array_element_no_space_before_comma',
        'blankline_after_open_tag',
        'method_argument_default_value',
        'function_typehint_space',
        'lowercase_cast',
        'namespace_no_leading_whitespace',
        'no_empty_comment',
        'no_empty_lines_after_phpdocs',
        'no_empty_phpdoc',
        'short_scalar_cast',
        'standardize_not_equal',
        'newline_after_open_tag',
        'php_unit_construct',
    ])
    ->finder(Symfony\CS\Finder\DefaultFinder::create()
    ->in(__DIR__.'/src')
    ->in(__DIR__.'/tests'));
