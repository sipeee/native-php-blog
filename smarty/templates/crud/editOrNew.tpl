{extends file="crud/layout.tpl"}

{block name='header'}
    <link href="/asset/css/richtext.min.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="/asset/js/jquery.richtext.min.js"></script>
    <script type="text/javascript" src="/asset/js/richtext-widget.js"></script>
{/block}

{block name="content"}
    <div class="container content update">
        <div class="row">
            <div class="col-xs-12">
                <h2>{block name="form_title"}{/block}</h2>
                <form action="{block form_action}{/block}" method="post">
                    <div class="container-fluid">
                    {foreach $fields as $field}
                        <div class="row">
                            <div class="col-xs-12 col-md-4">
                                <label for="form[{$field->getName()}]">{$field->getLabel()}</label>
                            </div>
                            <div class="col-xs-12 col-md-8">
                                {assign var="type" value=$field->getType()}
                                {include "crud/form-field/$type.tpl" name=$field->getName() value=$row[$field->getName()] parameters=$field->getParameters()}
                            </div>
                        </div>
                    {/foreach}
                    </div>
                    <input type="submit" value="{block name="form_submit_text"}{/block}" />
                </form>
            </div>
        </div>
    </div>

{/block}
