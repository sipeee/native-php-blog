{extends file="crud/layout.tpl"}

{block name="title"}{$configuration->getTitle()|escape} list{/block}

{block name="content"}
    <div class="content read">
        <h2>{$configuration->getTitle()|escape} list</h2>
        {if empty($configuration->createFields)}
        {assign var=params value=['action'=>'new']}
        <a href="{$request->getBaseUrl()}?{$params|query}" class="create-contact">Create {$configuration->getTitle()|escape}</a>
        {/if}
        <table>
            <thead>
            <tr>
                {foreach $configuration->getListFields() as $listField}
                    <td>{$listField->getLabel()}</td>
                {/foreach}
                <td>&nbsp;</td>
            </tr>
            </thead>
            <tbody>
            {foreach $rows as $row}
            <tr>
                {foreach $configuration->getListFields() as $listField}
                    {assign var="type" value=$listField->getType()}
                    <td>{include "crud/list-field/$type.tpl" value=$row[$listField->getName()] }</td>
                {/foreach}
                <td class="actions">
                    {assign var=params value=['action'=>'edit', 'id'=>$row.id]}
                    <a href="{$request->getBaseUrl()}?{$params|query}" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    {assign var=params value=['action'=>'delete', 'id'=>$row.id]}
                    <a href="{$request->getBaseUrl()}?{$params|query}" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            {foreachelse}
            <tr>
                <td colspan="{count($configuration->getListFields()) + 1}">No result found</td>
            </tr>
            {/foreach}
            </tbody>
        </table>
{*        <div class="pagination">*}
{*            <?php if ($page > 1): ?>*}
{*            <a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>*}
{*            <?php endif; ?>*}
{*            <?php if ($page*$records_per_page < $num_contacts): ?>*}
{*            <a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>*}
{*            <?php endif; ?>*}
{*        </div>*}
    </div>
{/block}
