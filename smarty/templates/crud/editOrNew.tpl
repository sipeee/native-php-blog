{extends file="crud/layout.tpl"}

{block name="content"}

    <div class="content update">
        <h2>{block name="form_title"}{/block}</h2>
        <form action="{block form_action}{/block}" method="post">
            {foreach $fields as $field}
            <div class="form-field">
                <label for="form[{$field->getName()}]">{$field->getLabel()}</label>
                {assign var="type" value=$field->getType()}
                {include "crud/form-field/$type.tpl" name=$field->getName() value=$row[$field->getName()] parameters=$field->getParameters()}
            </div>
            {/foreach}
            <input type="submit" value="{block name="form_submit_text"}{/block}" />
        </form>
    </div>

{/block}
