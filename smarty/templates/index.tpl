{extends file="layout.tpl"}

{block name='title'}Homepage{/block}

{block name='body'}
    <div class="container-fluid">
        <div class="row">
            {foreach $posts as $index => $post}
                {if 0 < $index && 0 == $index % 2}
                </div>
                <div class="row">
                {/if}
                <div class="col-md-6 col-xs-12">
                    <div class="container-fluid">
                        <div class="row article-header-block">
                            <div class="col-md-6 col-xs-12">
                                <h6>Author</h6>
                                <p class="post-details">{$post.email|escape}</p>
                            </div>
                            <div class="col-md-6 col-xs-12 text-right">
                                <h6>Publishing date</h6>
                                <p class="post-details">{$post.publish_at|date_format:'%Y. %m. %d. %H:%M'}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <h4 class="text-center article-title">{$post.title|escape}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <a href="/show.php?{assign var=params value=['id'=>$post.id]}{$params|query}" class="btn btn-primary article-show-button">
                                    Show post
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            {/foreach}
            </div>
        </div>
    </div>
{/block}