{extends file="crud/editOrNew.tpl"}

{block name="title"}{$configuration->getTitle()|escape} creation{/block}

{block name="form_title"}Create {$configuration->getTitle()|lower|escape}{/block}

{block name="form_action"}{assign var=params value=['action'=>'new']}{$request->getBaseUrl()}?{$params|query}{/block}

{block name="form_submit_text"}Create{/block}