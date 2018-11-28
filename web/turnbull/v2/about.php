<?php
/**
 * @file about.php
 * Renders the about page.
 */

require_once "includes/configuration.php";

$application->setTitle("About");

require "layout/header.php";
?>
<?php if (isset($_GET["article"]) && $_GET["article"] === "turnbull"): ?>
  <article class="container text-justify text-spaced">
    <div class="row page-header">
      <div class="col-xs-12">
        <h1>About Gavin Turnbull</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <p>Gavin Turnbull (1765-1816) published two books in Scotland before he emigrated in 1795. For the next two hundred years, the story ended there. The fullest nineteenth-century account admits that "Of the subsequent history of Turnbull we are almost entirely ignorant," and a twentieth-century account by Maurice Lindsay also draws a blank: "Turnbull married an actress, and with her emigrated to America, where all trace of them has been lost."<sup>1</sup><note place="bottom"><sup>1</sup> James Paterson, <em>The Contemporaries of Burns</em> (Edinburgh: Paton, 1840), p. 110; Maurice Lindsay, <em>The Burns Encyclopedia</em>, 3<sup>rd</sup> ed. (London: Robert Hale, 1980), p. 364.</note> Till quite recently, even the years of Turnbull's birth and all trace of them has been lost. In the 1840s, when a Scottish painter wanted to include Turnbull in his group portrait of Robert Burns, no Turnbull portrait could be found, and a shadowy depiction of "a visiting stranger" had to be substituted.<sup>2</sup><note place="bottom"><sup>2</sup> James Marshall, <em>A Winter with Robert Burns; Annals of his Patrons and Associates in Edinburgh, 1786-1787</em> (Edinburgh: Brown, 1846), pp. 156-157.</note> There is only one extant manuscript in Turnbull's hand, a short letter with a transcript of a song for the theatre by another writer.<sup>3</sup><note place="bottom"><sup>3</sup> Gavin Turnbull, Autograph letter, signed, with transcript of a song from by John O'Keefe's play <em>The Poor Soldier.</em>: M'Kie Collection, Dick Institute, Kilmarnock. The manuscript was given to the M'Kie Collection by Archibald M'Kay of Kilmarnock in the 1880s. There is an image on Future Museum (recto and verso): <a href="http://www.futuremuseum.co.uk/collections/people/key-people/burns/manuscripts/letter-from-gavin-turnbull-with-song-.aspx" target="_blank">http://www.futuremuseum.co.uk/collections/people/key-people/burns/manuscripts/letter-from-gavin-turnbull-with-song-.aspx</a>.</note></p>

        <p>The breakthrough came in 1995, when David Hill Radcliffe, researching the Spenserian influence in eighteenth-century poetry, noticed a number of Turnbull's pastoral poems being reprinted in newspapers in the 1790s, in Charleston, South Carolina.<sup>4</sup><note place="bottom"><sup>4</sup> David Hill Radcliffe, "Gavin Turnbull (ca. 1770-1816)," in his <em>Spenser and the Tradition: English Poetry, 1579-1830</em>, online at: <a href="http://spenserians.cath.vt.edu/AuthorRecord.php?&amp;action=GET&amp;recordid=33336&amp;page=AuthorRecord" target="_blank">http://spenserians.cath.vt.edu/AuthorRecord.php?&amp;action=GET&amp;recordid=33336&amp;page=AuthorRecord</a>; and more recently David Hill Radcliffe, "Turnbull, Gavin (c. 1765-1816)," <em>Oxford Dictionary of National Biography</em>, ed. H. C. G. Matthew and Brian Harrison (Oxford: Oxford UP, 2004), 55: 587.</note> Following up Professor Radcliffe's research, it was possible to find many more poems, including new poems written in America, and to document Turnbull's acting career in Charleston, almost play by play, night by night.<sup>5</sup><note place="bottom"><sup>5</sup> Patrick Scott, "Whatever Happened to Gavin Turnbull? Hunting Down a Friend of Burns in South Carolina," <em>Robert Burns Lives!</em>, ed. Frank Shaw, no. 159 (November 28, 2012), at: <a href="http://www.electricscotland.com/familytree/frank/burns_lives159.htm" target="_blank">http://www.electricscotland.com/familytree/frank/burns_lives159.htm</a>.; and cf. also Scott, "Introduction," in <em>A Bard Unkend: Selected Poems in the Scottish Dialect by Gavin Turnbull</em> (Columbia, SC: Scottish Poetry Reprints, 2015), pp. 5-12.</note> The U.S. census, Turnbull's nationalization record from 1813, and the Charleston city street directories provide other biographical data. Paradoxically, there is now more biographical information about Turnbull's last twenty years, living in South Carolina, than there is about his first thirty years living in Scotland.</p>

        <p>Turnbull was born in Berwickshire, in the Scottish borders, in 1765 and spent his early years in Hawick, in Roxburghshire.<sup>6</sup><note place="bottom"><sup>6</sup> Information on Turnbull's early life is sketchy. The birth date given above is calculated from the 1813 naturalization record, which gives his age and also place of birth: see Brent Holcomb, <em>South Carolina Naturalizations</em> (Baltimore: Genealogical Publishing, 1985).</note> His father Thomas Turnbull was notoriously improvident, and when the son was about ten, the family's problems put an end to his formal education. Turnbull spent his early teenage years as a carpet-weaver in Kilmarnock, Ayrshire, where he began writing poetry. The fullest description of his life at this time speaks both of hardship and literary commitment:</p>

        <blockquote>
          <p>He resided alone in a small garret, ... in which there was no furniture. The bed on which he lay was entirely composed of straw, ... with the exception of an old patched covering which he threw over himself at night. He had no chair to sit upon. A cold stone placed by the fire; and the sole of a small window at one end of the room was all he had for a table, from which to take his food, or on which to write his verses.<sup>7</sup><note place="bottom"><sup>7</sup> Thomas Crichton, in <em>The Weaver</em>, 2 (Paisley, 1819), quoted in James Paterson, <em>The Contemporaries of Burns</em> (Edinburgh: Paton, 1840), 93.</note></p>
        </blockquote>

        <p>Despite his circumstances, Turnbull got to know some of Robert Burns's circle of friends, including David Sillar and the local savant John Goldie. Burns would later refer to Turnbull as "an old friend of mine"<sup>8</sup><note place="bottom"><sup>8</sup> G. Ross Roy, ed., <em>Letters of Robert Burns</em>, 2 vols. (Oxford: Clarendon Press, 1985), II: 256-258.</note> He wrote poems to or about both Sillar and Goldie, and one of his most ambitious early poems, "The Bard; in the manner of <em>Spencer</em>," was "Inscribed to Mr. R***** B****." Several of his early poems comment ruefully on his poverty and the difficulty of winning recognition for his poetry. In his "Epistle to a Taylor," he describes himself as "A poet, tatter'd and forlorn, / Whase coat and breeks are sadly torn," and in his "Ode to David Sillar" he complains about the obtuseness of literary patronage:</p>

        <blockquote class="excerpt">
          <span>The greatest dults that ever wrote,</span>
          <span class="indent">Have often Noble Patrons got,</span>
          <span>Their nonsense to protect;</span>
          <span class="indent">Whilst chiels of maist ingine and skill,</span>
          <span>Unnotic'd, unrewarded still,</span>
          <span class="indent">Meet nought but could neglect.<sup>9</sup><note place="bottom"><sup>9</sup> Turnbull, "Ode to David Sillar," in <em>Poetical Essays</em> (1788), ll. 15-20.</note></span>
        </blockquote>

        <p>By 1788, he had written enough poems to make a first book, <em>Poetical Essays</em>, of over 200 pages. Like Burns's recent success <em>Poems, Chiefly in the Scottish Dialect</em>,<sup>10</sup><note place="bottom"><sup>10</sup> Robert Burns, <em>Poems Chiefly in the Scottish Dialect</em> (Kilmarnock: John Wilson, 1786).</note> and the volumes by Sillar and another local poet, John Lapraik, Turnbull's volume was published by subscription, at the author's risk rather than the printer's; Burns in fact was one of those who gathered subscribers for him. The title-page reads "Glasgow: printed by David Niven," but Niven was primarily a bookseller, and Turnbull's was the only volume of poems issued with his imprint in the 1780s. Turnbull comments in his preface that "some unfavourable circumstances in his situation, by hastening the publication, has &lt;sic&gt; prevented" the poems "from receiving that degree of correction, they would otherwise have obtained," and there is some internal evidence that the book, or at least the bulk of the book, was actually printed in Kilmarnock, on John Wilson's press (the printing-shop used by Burns, Sillar, and Lapraik), and only distributed under Niven's name.<sup>11</sup><note place="bottom"><sup>11</sup> Cf. Scott, <em>A Bard Unkend</em>, pp. 8, 15.</note></p>

        <p>Most of the poems in his <em>Poetical Essays</em> are in the Augustan pastoral style, often quite conventional lyrics on the themes of love and nature, using classical names for the "shepherds" who must stand in for the young Kilmarnock carpet-weaver:</p>

        <blockquote class="excerpt">
          <span>Muse, sing the passion of a rural pair,</span>
          <span>Damon the swain, Amanda was the fair:</span>
          <span>Long time he burn'd with love's resistless fire,</span>
          <span>And she as long, conceal'd the same desire;<sup>12</sup><note place="bottom"><sup>12</sup> Turnbull, "Morning," <em>Poetical Essays</em> (1788), ll. 149-152.</note></span>
        </blockquote>

        <p>Even his poem of tribute to Robert Burns, "The Bard," uses the Spenserian stanza and antique Spenserian vocabulary:</p>

        <blockquote class="excerpt">
          <span>There whilom ligd, ypent in garret high,</span>
          <span>A tuneful Bard, who well could touch the lyre,</span>
          <span>Who often sung so soot, and witchingly</span>
          <span>As made the crowds, in silent gaze, admire,</span>
          <span>Ymolten with the wild seraphic fire<sup>13</sup><note place="bottom"><sup>13</sup> Turnbull, "The Bard," in <em>Poetical Essays</em> (1788), ll. 19-23. On this aspect of Turnbull's poetry, see comments on inspanidual Turnbull poems on David Hill Radcliffe's large-scale digital project, <em>Spenser and the Tradition: English Poetry, 1579-1830</em>, as in n. 4 above.</note></span>
        </blockquote>

        <p>The epigraphs to and allusions in the poems suggest a range of reading, perhaps from anthologies or selections, comparable to that of Burns: Spenser, Milton, Shakespeare, Dryden, Pope, Thomson, Shenstone, Gray. It was this pastoral poetry that Turnbull himself put first when arranging the contents of his first book.</p>

        <p>Turnbull was also familiar with Scots vernacular poetry; the book contains a section titled "Poetical Essays in the Scottish Dialect," in obvious allusion to Burns's success, and there are epigraphs from or allusions to earlier Scots poets including Allan Ramsay, Hamilton of Bangour, Robert Fergusson, James Graeme, and Michael Bruce. Turnbull's Scots poems cover a spectrum of topics as also of vernacular styles. "The Cottage," a paean to rural independence in Spenserian metre that looks back to Fegusson's "Farmer's Ingle" and Burns's "The Cotter's Saturday Night," starts formally, but its Scots becomes more evident as the reader is taken into the farmstead and then inside the cottage itself:</p>

        <blockquote class="excerpt">
          <span class="indent">A twa-arm'd chair within the neuk ye'll see,</span>
          <span class="indent">Where aft the guidman leans, wi' meikle glee,</span>
          <span class="indent">And smoaks his pipe, and tells his pawky tale,</span>
          <span class="indent">An antic ambry, made of aiken tree,</span>
          <span class="indent">Wi' caps and luggies, rang'd upon a dale,</span>
          <span>And meikle toop-horn spoons, and plates to haud the kail.<sup>14</sup><note place="bottom"><sup>14</sup> Turnbull, "The Cottage," <em>Poetical Essays</em> (1788), ll.22-27, but revised and extended for <em>Poems</em> (1794).</note></span>
        </blockquote>

        <p>Other noteworthy Scots poems in the volume include Turnbull's description of a Kilmarnock bookshop, "Sale of Stationary Ware," his "Ode to David Sillar" (using the Burns stanza or Standard Habbie), and the drinking song, "Ye lads that are plaguet wi' lasses."</p>

        <p>It is not clear quite when or why Turnbull left Kilmarnock. Most sources, based on the Niven imprint, say that he moved to Glasgow. In May 1789, Burns was enquiring as to Turnbull's whereabouts so he could forward some of the subscription money he had collected.<sup>15</sup><note place="bottom"><sup>15</sup> Roy, <em>Letters</em>, I: 399, 413-414.</note> The only early detailed biographical account, by Thomas Crichton, depicts Turnbull as a friend of the Paisley poet Alexander Wilson. One of his later poems, the prologue to <em>The Embarkation</em>, suggests he may have been connected with the theatre in Edinburgh. The next definite information is in the fall of 1793, when Turnbull and his actress-wife joined the company at the recently-built theatre in Dumfries, headed by the actor-manager J. B. Williamson and the youthful star (and future Mrs. Williamson) Louisa Fontenelle. In Dumfries, Turnbull wrote theatrical prologues and songs, and even a one-act comedy <em>The Recruit</em>, and he reconnected with Robert Burns, who in October 1793 forwarded some of Turnbull's (English) songs to George Thomson for possible inclusion in his <em>Select Collection of Original Scotish Airs</em>.<sup>16</sup><note place="bottom"><sup>16</sup> On the Dumfries theatre in the 1790s, the fullest source is the Colin Morton Archive (research notes for an unfinished history), in the Ewart Library, Dumfries.</note> Turnbull collected some of this new writing, including his play, and reprinted a few earlier items, as a second, smaller book, <em>Poems, by Gavin Turnbull, Comedian</em> (Dumfries: for the Author, 1794).</p>

        <p>One of the new poems is connected with his theatrical work, his prologue to Allan Ramsay's <em>The Gentle Shepherd</em>, in which Ramsay reports on his reception among the immortals:</p>

        <blockquote class="excerpt">
          <span>When Death, that camsheugh carl, had fell'd me,</span>
          <span>And first Elysian fouk beheld me,</span>
          <span>My auld blue bonnet on my head,</span>
          <span>And hamely Caledonian weed;</span>
          <span>They cry'd, "preserve's: what's yon droll body,</span>
          <span>That gangs just like a niddy noddy?</span>
          <span>'Tis some bit poor auld Scottish herd":</span>
          <span>"Na faith!" quo' Hermes, "he's a Bard,</span>
          <span>Sic as the deel a' mae ye'll find,</span>
          <span>And ane of the Dramatic kind."</span>
          <span>Syne he pronounc'd aloud my name,</span>
          <span>A current passport for my fame. ...</span>
          <span>And a' that had a spunk of grace</span>
          <span>Gied me kind welcome to the place;<sup>17</sup><note place="bottom"><sup>17</sup> Turnbull, "Prologue to <em>The Gentle Shepherd</em>", in <em>Poems</em> (1794), ll. 7-18, 24-25.</note></span>
        </blockquote>

        <p>Turnbull's Dumfries poems also reflect the changing political climate in 1790s Scotland, with the government crackdown against any hint of sedition. The Dumfries theatre itself became the subject of conservative suspicion. In Dumfries, in late 1792, the audience in the pit sang the French revolutionary song "<em>Ça ira</em>," while hissing "God save the King," and when the Dumfries actors, including Turnbull, toured across the border to Whitehaven in March 1794, the Earl of Lonsdale had them arrested as vagrants, after they put on the insurrectionary Ossianic melodrama <em>Oscar and Malvina</em>. Burnsians will recall this event from the fragment "Esopus to Maria," and the fall-out (along with Williamson's financial irregularities) led to the break-up of the Dumfries theatrical company. In 1794, reprinting his earlier poem "The Cottage," Turnbull added a new stanza, rebuking aristocratic luxury quite as plainly as Burns does in "Is there for honest poverty." His satirical poem "The Clubs" gives, however, a more detached or cautious view, portraying the heated political enthusiasm and debate in the Dumfries inns as not so different from other forms of convivial intoxication:</p>

        <blockquote class="excerpt">
          <span>Another vows his resolution</span>
          <span>Is to o'erturn the constitution.</span>
          <span>A chap, mair noisy than the rest,</span>
          <span>Declares he likes the&mdash;&mdash;what is't, best?</span>
          <span>And swears, by blood, and death, and hell&mdash;</span>
          <span>He kens what he would do himsel'!</span>
          <span>Whilst others, at a less expence,</span>
          <span>Are counted miracles of sense;</span>
          <span>Important looks, and shrugs, and hitches,</span>
          <span>Do mair than twenty learned speeches!<sup>18</sup><note place="bottom"><sup>18</sup> Turnbull, "The Clubs," in <em>Poems</em> (1794), ll. 38-46.</note></span>
        </blockquote>

        <p>It has long been known that, after the break-up of the Dumfries theatre, Turnbull and his wife emigrated to America, but there had been no information about where he settled, or what he did when he got there. Certainly the poetry he wrote in America was unknown to Scottish readers or scholars. It is now established that, in November 1795, Turnbull joined one of the two theatre companies in Charleston, South Carolina, and that, aside from brief tours, he remained in Charleston the rest of his life. While the immediate reason for emigrating was presumably economic, he also embraced the young republic as a land of political freedom, writing patriotic odes to Columbus and for General Washington's birthday. He lived at then-modest addresses in downtown Charleston; records suggest that the Turnbulls did not have slaves. In May 1796, he wrote a poem about the major fire that swept through Charleston. In 1813, when Britain and America were at war, he took American citizenship.</p>

        <p>Charleston had long had Scottish connections, but during the Revolution some prominent Charleston Scots had been loyalists, and Scottishness fell under suspicion. Turnbull still identified himself strongly as a Scot. He brought to the Charleston stage a number of Scottish plays that had been in the Dumfries repertoire, including Home's <em>Douglas</em>, Ramsay's <em>Gentle Shepherd</em> (for its Charleston premiere), as well as <em>Oscar and Malvina</em> and his own comedy <em>The Recruit</em>. He went on writing and publishing poetry in the Charleston newspapers and other American periodicals, though his proposal to publish a new collection, in 1796 and again in 1800, came to nothing. In 1808 one of his Scots poems, "The Auld Fiddle," was republished in the prestigious Philadelphia magazine <em>Port Folio</em>, perhaps through the interest of another Scottish emigrant poet, his old friend from Paisley, Alexander Wilson the ornithologist, who worked for the magazine's publisher.</p>

        <p>Despite his own truncated formal education, as time went by Turnbull supplemented his work for the theatre by teaching, taking a few students into his house; in the Charleston city directories of 1809 and 1813, his occupation is listed as schoolmaster. Financial security seems to have eluded him. When he died in 1816, aged fifty-one, a Charleston newspaper asked its readers to consider "the melancholy fate of genius crushed by indigence."<sup>19</sup><note place="bottom"><sup>19</sup> <em>Charleston Courier</em>, June 3, 1816.</note> Yet he does not seem to have been discontented. One of the new poems he published in Charleston offered advice to "a friend dissatisfied with his situation.":</p>

        <blockquote class="excerpt">
          <span>In vain from place to place we roam,</span>
          <span>In vain we quit our native home, ...</span>
          <span>And hope to find serener skies</span>
          <span>Where, undisturbed, contentment lies. ...</span>
          <span>Bright reason wisely whispers "Care,</span>
          <span>Weak man, will haunt thee ev'rywhere:"</span>
          <span>Content alone can boast the charm</span>
          <span>That can the busy fiend disarm.<sup>20</sup><note place="bottom"><sup>20</sup> Turnbull, "Ode to a Friend, dissatisfied with his situation," <em>Columbia Herald</em>, May 23, 1796, ll. 1-2, 5-6, 57-60.</note></span>
        </blockquote>

        <p>It is not necessary to make exaggerated claims for Turnbull's Scottish poetry to assert its continuing interest. If Turnbull is still, in his own phrase, "a bard unkend," his poems are worth rediscovery. The poetry of Burns's Ayrshire contemporaries, the poetry written by labouring-class Scottish poets, and the stylistic interplay between 18th century poetry in Scots and that written in the Augustan tradition&mdash;all these have been receiving renewed scholarly and critical attention.<sup>21</sup><note place="bottom"><sup>21</sup> See, e.g., Carol McGuirk, <em>Robert Burns &amp; the Sentimental Era</em> (Athens, GA: University of Georgia P, 1985) and <em>Reading Robert Burns</em> (London: Pickering &amp; Chatto, 2014), esp. ch. 1; David Hill Radcliffe, "Imitation, Popular Literacy and 'The Cotter's Saturday Night'," in <em>Critical Essays on Robert Burns</em>, ed. Carol McGuirk (New York: G. K. Hall, 1998), 251-279; Corey E. Andrews, "'Almost the same but not quite': English Poetry by Eighteenth-Century Scots," <em>Eighteenth Century: Theory and Interpretation</em>, 47:1 (2006): 59-79; Nigel Leask, <em>Robert Burns and Pastoral</em> (Oxford: Oxford UP, 2010); Gerard Carruthers, "Robert Burns's Scots Poetry Contemporaries," in <em>Burns and Other Poets</em>, ed. David Sergeant and Fiona Stafford (Edinburgh: Edinburgh UP, 2012): 38-52; Corey E. Andrews, <em>The Genius of Scotland</em> (Amsterdam: Rodopi, 2015), esp. pp. 94-103.</note> Beyond or alongside these scholarly concerns, however, Turnbull's poetry and his story retain a human interest, carrying his lively voice across the passing of two centuries.</p>

        <p>Patrick Scott</p>

        <footnote></footnote>
      </div>
    </div>
  </article>
<?php elseif (isset($_GET["article"]) && $_GET["article"] === "project"): ?>
  <article class="container text-justify text-spaced">
    <div class="row page-header">
      <div class="col-xs-12">
        <h1>About This Project</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <h2>Scope and Arrangement</h2>
        <p><em>The Collected Poems of Gavin Turnbull</em> contains 89 individual poems and songs, organized according to the date of their first publication. The poems are grouped into one of four sections, following the sequence of the books, manuscript, or periodicals in which they are first found. Turnbull's two prose prefaces (1788, 1794) and his short play <em>The Recruit</em> (also 1794) are included, but placed last, after the poems, as Appendices.</p>

        <p>A list of the individual poems and songs in each section and links to the texts are available in the gray drop-down menu on the left-hand side of the screen. With the few exceptions noted below, this edition only includes each poem once, under the date of its first appearance, and poems that Turnbull subsequently reprinted are not repeated in the later section(s).</p>

        <h2>The Choice of Text and Editorial Policy</h2>
        <p>This edition aims to reproduce Turnbull's texts as they were encountered by their first readers. The text used is therefore taken from the first published version, and where a poem was printed two or more times, the earliest text is used, though any substantive differences between early and later texts are fully noted.</p>

        <p>The one exception to this general policy is for Turnbull's poem "The Cottage," first published in 1788; when he reprinted it in 1794, Turnbull added an extra stanza, and he retained this fifth stanza when he reprinted it again in a Charleston newspaper, though both reprintings also show a steady departure from Turnbull's original text in many smaller details. In this case, placed under 1788 in the publication sequence, the edition presents an eclectic text, on the older editorial Greg-Bowers editorial pattern, with the 1788 version as copytext, but incorporating the fifth stanza as a substantive and clearly authorial revision; again substantive differences between different versions of the text are noted.</p>

        <h3 class="clear-bottom"><em>Poetical Essays</em> (1788)</h3>
        <p class="clear-top">The first section contains 50 poems and songs, all probably written while he was still living in Kilmarnock, and published in Turnbull's first book, <em>Poetical Essays</em> (1788), published by subscription and appearing with the imprint of a Glasgow bookseller. The volume was subdivided into "Elegies," "Pastorals," "Odes," "Poetical Essays, in the Scottish Dialect," and "Songs." We have not replicated these subdivisions of the volume, but we have maintained the order in which the texts originally appeared. The subsection headings are, however, available in the print version of the edition.</p>

        <h3 class="clear-bottom">Poems from Burns's letter to George Thomson (1793)</h3>
        <p class="clear-top">There are no known surviving poetic manuscripts in Turnbull's hand, but in a letter to George Thomson (October 29, 1793), Robert Burns copied out three of Turnbull's songs in a letter to George Thomson, recommending Turnbull as a potential contributor of song-texts to Thomson's <em>Select Collection of Original Scotish Songs</em>. Burns's letter gives the only known text of two of the songs, and, though Turnbull would later publish of the third song, "Laura"( in <em>Columbian Herald and New Daily Advertiser</em>, Charleston, SC, April 14, 1796), that later text shows no significant variants from the one copied out by Burns.  The edition therefore keeps these three songs together as a group, under the date of the Burns letter.</p>

        <h3 class="clear-bottom"><em>Poems</em> (1794)</h3>
        <p class="clear-top">This section contains the twelve poems or songs that were first published in Turnbull's second volume, <em>Poems</em>, printed in Dumfries in 1794. As noted above, Turnbull's play, <em>The Recruit</em>, which had been included in the 1794 volume, is placed separately with the "Appendices."</p>

        <h3 class="clear-bottom">Poems first published in America</h3>
        <p class="clear-top">After emigrating to America, and settling as an actor in Charleston, South Carolina, in late 1795, Turnbull continued to publish poetry, mostly in Charleston newspapers, but later also in the prestigious Philadelphia magazine, <em>Port Folio</em>. The poems Turnbull published in America included both reprinted items that he had earlier published in Scotland and items that were newly written. This section of the edition contains twenty-five poems, ranging in date from 1796 to 1809. Of the twenty-seven, twenty-three are items that Turnbull had never previously published; the four reprinted items are the four songs that Turnbull himself extracted from his play <em>The Recruit</em> for separate newspaper publication, and which are given similar separate status among his newspaper publications.</p>

        <h3 class="clear-bottom">Appendices</h3>
        <p class="clear-top">This section includes Turnbull's prose prefaces to his two books, in 1788 and 1794, and the full text of Turnbull's one-act comedy, <em>The Recruit</em>.</p>

        <h2>Annotation</h2>
        <p>The online edition of <em>The Collected Poems of Gavin Turnbull</em> allows for expanded annotation, especially in glossing words that might cause difficulties for students outside of Scotland, as well as linking to related material, such as contemporary images and sheet music. The first note on each text records its publication history, both first publication and any reprinting in Turnbull's lifetime. The first note may also contain general background information relevant to the poem. Subsequent notes linked to specific lines gloss difficult or distinctive words, suggest literary sources or allusions, and provide historical or background information. The annotations are numbered chronologically rather than by line number.</p>

        <p>The annotations can be accessed in one of two ways. The user can move the cursor over a superscript number in the body of the text, so that a dialogue box will appear with the annotation alongside the line it is explaining, or can scroll down the poem and find the relevant numbered annotation where the notes are grouped together in sequence at the end of the text.</p>

        <p>Turnbull himself printed footnotes to some poems, and these are reproduced in this edition, linked to the appropriate point in the poem. Notes of this kind, that first appeared in <em>Poetical Essays</em> (1788) and <em>Poems</em> (1794) have been placed in square brackets, introduced as "GT's note," to differentiate them from the editors' notes.</p>

        <h2>Text Encoding</h2>
        <p>All text files have been marked-up and prepared in accordance with TEI P5 guidelines&mdash;the standard XML language in the Humanities&mdash;to allow for greater interoperability, both in this edition in and future projects.  The website runs with PHP and, though does not use a database, is modeled on one; every time a user clicks on a navigational file, the site pulls the associated XML file and renders it properly.</p>
      </div>
    </div>
  </article>
<?php endif; ?>
<?php require "layout/footer.php"; ?>
