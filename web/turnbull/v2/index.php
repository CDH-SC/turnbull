<?php
/**
 * @file index.php
 * Renders the index page.
 */

require "layout/header.php";
?>
<div class="container" style="margin-top: 3.5%;">
  <div class="row">
    <div class="col-xs-7">
      <section class="alert alert-warning hide">
        <strong>Outdated browser detected!</strong>
        Please <a href="#" class="alert-link" target="_blank">upgrade to at least version <span id="version"></span></a> for <span id="browser"></span> or switch to another browser.
      </section>

      <section class="col-xs-7 center-block excerpt">
        <em>
          <span>Dear sir, if my unnotic'd name,</span>
          <span>Not yet proclaim'd by trump of fame,</span>
          <span>Has reach'd your lugs, then swith attend,</span>
          <span>This essay of a Bard unkend.</span>
          <span class="text-right">Turnbull, "Epistle to a Black-smith" (1788)</span>
        </em>
      </section>

      <article class="text-justify text-spaced" style="margin-top: 5%; margin-bottom: 5%;">
        <p><strong>The Collected Poems of Gavin Turnbull Online</strong> presents the first-ever full collection of writings by the Scottish poet Gavin Turnbull (1765-1816). It includes the writings he published both in Scotland and later in America. In the 200 years since he died, only a handful of Turnbull's poems have been available in anthologies or online, and his Charleston writings have never been collected.</p>

        <p>Turnbull, a younger contemporary of Robert Burns, started writing as a teenager carpet-weaver in Kilmarnock, Ayrshire, in the 1780s. He published his first ever book collection, Poetical Essays, in 1788 and Poems in 1794, when he was an actor with a theatre company in Dumfries. In 1795, he emigrated to the United States, settling in Charleston, South Carolina, acting in the Charleston theatres, and continuing to write poetry. He became a U.S. citizen in 1813 and died in Charleston in 1816.</p>

        <p>The Collected Poems of Gavin Turnbull Online, edited by Patrick Scott, John Knox, and Rachel Mann, with the assistance of Eric Roper, includes all of Turnbull's poems, in their earliest published texts with expanded annotation, together with his comedy, The Recruit (1794), which was staged both in Dumfries and Charleston. The online edition is complete in itself, but a related print edition is being prepared for a print-on-demand paperback.</p>
      </article>

      <h2>Sample Poems</h2>

      <section class="list-group">
        <?php
        $renderer = new Renderer();
        $renderer->renderRandom();
        ?>
      </section>
    </div>

    <div class="col-xs-5">
      <img src="<?php print ROOT_FOLDER; ?>img/GT188Titlepage.jpg" class="img-responsive center-block" alt="Poem title page">
      <p class="text-muted" style="margin-top: 1%;">GT 188 Title Page</p>
    </div>
  </div>
</div>
<?php require "layout/footer.php"; ?>
