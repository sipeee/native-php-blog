<select name="form[{$name}]" {if isset($parameters['required']) && $parameters['required']}required="required"{/if}>
    {if !isset($parameters['required']) || !$parameters['required']}
        <option value="">No selection</option>
    {/if}
    {foreach $parameters.options as $optionValue => $optionLabel}
        <option value="{$optionValue}" {if null !== $value && $optionValue == $value}selected="selected"{/if}>{$optionLabel}</option>
    {/foreach}
</select>
