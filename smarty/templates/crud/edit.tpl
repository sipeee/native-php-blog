{extends file="crud/editOrNew.tpl"}

{block name="title"}{$configuration->getTitle()|escape} edit{/block}

{block name="form_title"}Edit {$configuration->getTitle()|lower|escape}{/block}

{block name="form_action"}{assign var=params value=['action'=>'edit', 'id' => $id]}{$request->getBaseUrl()}?{$params|query}{/block}

{block name="form_submit_text"}Update{/block}