{extends file="layout.tpl"}

{block name='title'}Read post "{$post.title|escape}{/block}"

{block name='body'}
    <div class="container-fluid">
        <div class="row">
            <h4 class="text-center article-title">{$post.title|escape}</h4>
            <div class="col-sm-6 col-xs-12">
                <h6>Author</h6>
                <p class="post-details">{$post.email|escape}</p>
            </div>
            <div class="col-sm-6 col-xs-12 text-right">
                <h6>Publishing date</h6>
                <p class="post-details">{$post.publish_at|date_format:'%Y. %m. %d. %H:%M'}</p>
            </div>
            <hr />
            <div class="col-xs-12">
                {$post.content}
            </div>
            <div class="col-xs-12 text-center">
                <a href="/" class="btn btn-primary article-show-button">
                    Back to index
                </a>
            </div>
        </div>
    </div>
{/block}