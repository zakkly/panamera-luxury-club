{include file="header.tpl"}
	<div id="Content" class="pageWrap">
		<section class="newsWrap wrapBlock">
			<header class="caption-header">
				<div class="header-inner">
					<img class="pc_img" src="{$smarty.const.BASE_IMAGE}news_paget_view.jpg" alt="{$smarty.const.BASE_ALT}LaLaPaloozaからのお知らせ" title="" width="1920" height="660" />
					<img class="sp_img" src="{$smarty.const.BASE_IMAGE}sp_news_paget_view.jpg" alt="{$smarty.const.BASE_ALT}LaLaPaloozaからのお知らせ" title="" width="640" height="480" />
					<h2 class="header_ttl quicksan">
						News<span class="ja">{$smarty.const.SHOP_NAME}からのお知らせ</span>
					</h2>
				</div>
			</header>
			<div class="news-guide">
				<section class="postWrap">
					<div class="inner">
						<article>
							<div class="post-ttl">
								<span class="postDate">({$news[0].news_create_date|date_format:"%Y&#24180;%m&#26376;%d&#26085;"}配信)</span>
								<h3 class="postTit">{$news[0].news_title|default:""}</h3>
							</div>
							<div class="post-detail">
								{$news[0].editor|default:""}
							</div>
						</article>
					</div>
				</section>
				<div class="pagingWrap">
					<div class="inner">
						<ul>
							<li class="prev">
								{if !empty($newsPN.prev)}
								<a href="{$smarty.const.BASE_NEWS_DISP}{$newsPN.prev}/"><p class="text">前の記事</p></a>
								{/if}
							</li>
							<li class="next">
								{if !empty($newsPN.next)}
								<a href="{$smarty.const.BASE_NEWS_DISP}{$newsPN.next}/"><p class="text">次の記事</p></a>
								{/if}
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
	</div>
{include file="footer.tpl"}
