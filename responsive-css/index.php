
<?php 
$title = 'Responsive CSS';
$subtitle = 'How to make your pages work well on all devices';
include '../header.php';
?>

<p>These days the <a href="https://searchenginewatch.com/sew/opinion/2353616/mobile-now-exceeds-pc-the-biggest-shift-since-the-internet-began">majority of people accessing any web site you build</a> will be using a small mobile touchscreen device. But there will still be a significant minority who will access that same site from a laptop or desktop device with a much larger monitor. This poses an interesting design dilemma: how do we build one site that looks and works well on both a tiny phone screen as well as a gigantic desktop monitor?</p>

<p>There is no one magic formula for this, but there are some best practices, as well as some powerful CSS features that let us adjust our page's appearance and layout based on the screen size.</p>

<h2>Mobile-First Design</h2>

<p>Because the majority of web traffic is now coming from mobile devices, the current best practice is to design your site for a mobile device first, and only later consider how you can take advantage of the larger screen of a desktop. This is known as &quot;mobile-first design.&quot; In general this boils down to the following principles:</p>

<ul>

    <li><strong>Layout</strong>: Blocks of content should stack on top of each other on narrow screens, but sit side-by-side on wider screens. You can also use the <code>max-width</code> property to constrain the overall width of your content so that it doesn't stretch to ridiculous line lengths on super-wide monitors. Content fixed to the viewport (<code>layout: fixed</code>) should be kept to a minimum on small screens, as it reduces the amount of scrollable screen real-estate.</li>

    <li><strong>Media</strong>: Large images and video look great on large monitors, but typically don't work as well on small screens. They also take much longer to download over slow mobile links. Consider using background colors instead of background images on mobile, or use lower-resolution images so that they download faster.</li>

    <li><strong>Fonts</strong>: Font sizes may need to be adjusted so that text remains readable as the screen size changes.</li>

    <li><strong>Navigation</strong>: Site navigation links take up a lot of room on small screens and may end up wrapping to multiple lines. Keep the site navigation hidden on small screens and show it only when the user taps a menu icon (colloquially known as the &quot;hamburger icon&quot;). Most CSS frameworks (which we will learn about next) provide some kind of collapsible navigation on mobile.</li>

    <li><strong>Input and Interaction</strong>: Tap/click targets need to be large-enough on mobile to select using a finger, especially for people with poor eyesight or thick fingers. Tiny icons placed right next to one another, or one-word hyperlinks are difficult to select accurately. Specifying a data type on form fields (e.g., email address, phone number, date, integer) also generates optimized on-screen keyboards, making data entry much easier.</li>

    <li><strong>Content</strong>: For some sites, you may even want to adjust what content is shown to mobile users as opposed to desktop users. For example, a phone number might become a large &quot;call&quot; icon with a <code>tel:</code> hyperlink on phone-sized screens, but simply appear as a normal telephone number on larger screens.</li>

</ul>

<h2>Media Rules</h2>

<p>All of the style rules we saw in the <a href="../essential-css">Essential CSS Tutorial</a> apply to all devices and screens regardless of size. But CSS now lets us define blocks of rules that apply only when the screen size is at least a particular width. We do this via <a href="http://www.w3schools.com/cssref/css3_pr_mediaquery.asp">media rules</a>, which look like this:</p>

<pre><code class="language-css">
/* rules that apply to all devices */
body {
    background-color: rgb(255,64,129); /* background color on small screens */
    font-size: 16px;                   /* default font size is 16 pixels */
}

/* rules that apply only to screens 768 pixels and wider */
@media (min-width: 768px) {
    body {
        background-image: url(...);   /* use background image on larger screens */
        font-size: 18px;              /* increase font size to 18 pixels on larger screens */
    }

    .mobile-call-icon {
        display: none;                /* hide mobile call icon */
    }
}
</code></pre>

<p>The <code>@media</code> rule defines a new block of style rules that apply only when the conditions of the <code>@media</code> rule are met. In this case, the <code>@media</code> rule condition is &quot;the device width is at least 768 pixels.&quot; If the current device width is less than <code>768px</code>, the rules inside the block do not apply. If the width is equal to or greater than <code>768px</code>, they do.</p>

<p>All rules defined outside of a <code>@media</code> rule block will always apply to all screens. So you can define several rules at the top of your stylesheet that create your default formatting, and then adjust only the properties you need to change inside the <code>@media</code> rule block. Because they appear later, they override the same property setting in the earlier rules.</p>

<p>You can define as many <code>@media</code> rule blocks as you want in a stylesheet, each with a different condition, but most professionals define only a few that match the common breakpoints between phone, tablet, and desktop screen widths.</p>

<p>The rules inside the <code>@media</code> rule can alter the formatting of any element, including completely hiding or showing it using the <code>display</code> property. Setting <code>display: none</code> will remove the element from the page, and <code>display: block</code> or <code>display: inline</code> will show it.</p>

<h2>Flexbox</h2>

<p>On narrow screens content blocks should stack on top of each other, but on wider screens we should take advantage of the extra room and display at least some content blocks side-by-side. In the past, we used the <code>float</code> and <code>clear</code> properties to achieve multi-column layouts, but this technique was fraught with bugs due to browser inconsistencies. Thankfully, there is a newer standard specifically designed for multi-column layouts: Flexbox. </p>

<div class="alert alert-warning">Note: the <a href="http://caniuse.com/#feat=flexbox">only browser that doesn't support flexbox is IE</a>, but Microsoft's new Edge browser does support it. If you must support IE users, you should use the grid system in one of the popular CSS Frameworks (Bootstrap, Material Design Lite, Materialize, etc.). We will learn about CSS frameworks next.</div>

<p>Flexbox requires one element to act as the container element, and one element per column in your layout. To make a four-column layout, your HTML and CSS would be like this:</p>

<pre><code class="language-html">
&lt;div class="container"&gt;
    &lt;div class="column"&gt;
        &lt;h2&gt;Column 1&lt;/h2&gt;
        &lt;p&gt;...&lt;/p&gt;
    &lt;/div&gt;
    &lt;div class="column"&gt;
        &lt;h2&gt;Column 2&lt;/h2&gt;
        &lt;p&gt;...&lt;/p&gt;
    &lt;/div&gt;
    &lt;div class="column"&gt;
        &lt;h2&gt;Column 3&lt;/h2&gt;
        &lt;p&gt;...&lt;/p&gt;
    &lt;/div&gt;
    &lt;div class="column"&gt;
        &lt;h2&gt;Column 4&lt;/h2&gt;
        &lt;p&gt;...&lt;/p&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>

<pre><code class="language-css">
* {
    box-sizing: border-box; /* include padding and border is size calcs */
}

.container {
    display: flex; /* start a flexbox */
}

.column {
    flex-grow: 1;  /* all columns equal size */
    padding: 0 0.25em; /* a little padding between columns */
}</code></pre>

<p data-height="300" data-theme-id="dark" data-slug-hash="vKVgrB" data-default-tab="css,result" data-user="drstearns" data-embed-version="2" data-editable="true" class="codepen">See the Pen <a href="http://codepen.io/drstearns/pen/vKVgrB/">Flexbox</a> by Dave Stearns (<a href="http://codepen.io/drstearns">@drstearns</a>) on <a href="http://codepen.io">CodePen</a>.</p>
<script async src="//assets.codepen.io/assets/embed/ei.js"></script>

<p>By default, browsers will apply sizes like <code>100%</code> to just the content within a box and not the padding or borders on the box. But in our case, we want the column size to also include the padding we put on the left and right; otherwise, it might wrap to the next line. To force the browser to take the padding into consideration when sizing the column, we set <code>box-sizing</code> to <code>border-box</code>. This ensures that the content plus the padding will be sized to 100% of the containing element. Here we use the <code>*</code> selector, which selects every element in the page, so this setting will apply to all elements. We could be more targeted and set <code>box-sizing</code> only on the <code>.column</code> rule, but this setting is what you want most of the time on all elements when doing multi-column layouts, so it's common practice to just apply it to all elements using the <code>*</code> selector.</p> 

<p>This will create a four column layout on all screens, but we can make this responsive by adding some <code>@media</code> rule blocks, and adjusting a few properties. Let's start by making the columns stacked on top of each other on small phone screens, but side-by-side on wider screens:</p>

<pre><code class="language-css">
* {
    box-sizing: border-box;
}

.container {
    display: flex;
    flex-wrap: wrap; /* wrap columns to next line if needed */
}

.column {
    flex-grow: 1;
    flex-basis: 100%; /* columns take up whole line */
    padding: 0 0.25em;
}

/* rules for screens 780px and wider */
@media (min-width: 780px) {
    .container {
        flex-wrap: nowrap /* stop wrapping columns */
    }
    .column {
        flex-basis: auto; /* columns sized equally */
    }
}
</code></pre>

<p data-height="550" data-theme-id="dark" data-slug-hash="GqYAVp" data-default-tab="css,result" data-user="drstearns" data-embed-version="2" data-editable="true" class="codepen">See the Pen <a href="http://codepen.io/drstearns/pen/GqYAVp/">Flexbox Responsive</a> by Dave Stearns (<a href="http://codepen.io/drstearns">@drstearns</a>) on <a href="http://codepen.io">CodePen</a>.</p>
<script async src="//assets.codepen.io/assets/embed/ei.js"></script>

<p>The <code>flex-basis</code> property controls how much width each column takes up by default, so setting it to 100% causes the column to stretch to the entire width of the container. Because we set <code>flex-wrap</code> to <code>wrap</code>, the following columns wrap to the next line, creating a stacked one-column layout.</p>

<p>We can then extend this to support a two-by-two layout on medium screens:</p>

<pre><code class="language-css">
* {
    box-sizing: border-box;
}

.container {
    display: flex;
    flex-wrap: wrap; /* wrap columns to next line if needed */
}

.column {
    flex-grow: 1;
    flex-basis: 100%; /* columns take up whole line */
}

/* rules for screens 480px and wider */
@media (min-width: 490px) {
    .column {
        flex-basis: 50%; /* columns take up half the line */
    }
}

/* rules for screens 780px and wider */
@media (min-width: 780px) {
    .container {
        flex-wrap: nowrap /* stop wrapping columns */
    }
    .column {
        flex-basis: auto; /* columns sized equally */
    }
}
</code></pre>

<p data-height="656" data-theme-id="dark" data-slug-hash="qNJAEG" data-default-tab="css,result" data-user="drstearns" data-embed-version="2" data-editable="true" class="codepen">See the Pen <a href="http://codepen.io/drstearns/pen/qNJAEG/">Flexbox Responsive 2</a> by Dave Stearns (<a href="http://codepen.io/drstearns">@drstearns</a>) on <a href="http://codepen.io">CodePen</a>.</p>
<script async src="//assets.codepen.io/assets/embed/ei.js"></script>

<p>When we adjust <code>flex-basis</code> to <code>50%</code>, the columns now take up half the row width, allowing two columns to sit side-by-side on each line on screens 490px to 780px. Adjusting the property to <code>auto</code> causes the browser to give equal width to each column so that they all end up side-by-side on the same line. We also turn off wrapping to ensure that all the columns remain on one line.</p>

<h2>Keep Learning</h2>

<p>This is just a taste of what flexbox can do. See Chris Coyier's <a href="https://css-tricks.com/snippets/css/a-guide-to-flexbox/">A Complete Guide to Flexbox</a> for more details.</p>


<?php 
include '../footer.php'; 
?>
