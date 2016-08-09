In the [Essential CSS](../essential-css/) and [Responsive CSS](../responsive-css/) tutorials, you learned how to write style rules to change the appearance of your web pages. Although you could implement a site with all custom style rules, most professionals build upon a well-tested **CSS framework** instead. The framework takes care of all the standard formatting, and defines several style classes you can use for common UI elements (badges, alerts, responsive navigation bars, tabs, drop-down buttons, tool tips and popovers, sliders, switches, carousels, etc.). You can then add your own custom rules on top of the framework to tweak the framework formatting, or add your own UI elements.

A CSS framework is just a stylesheet with a bunch of rules that someone else wrote for you, and some accompanying JavaScript for the interactive elements. There's nothing magic about it. You can look at the stylesheet and see all the rules that are defined in there, and it's all stuff you could have written yourself. But those rules have been crafted by professionals and tested on a wide array of browsers to ensure consistent results, so we might as well build on top of them.

## Popular CSS Frameworks

There are several popular CSS frameworks to choose from. All of them provide beautiful standard formatting, pre-defined responsive layout grids that work on all browsers, and all the common UI elements you see on most web sites.

### Bootstrap

Perhaps the most commonly-used CSS framework is [Bootstrap](http://getbootstrap.com/). It was originally created at Twitter to enforce some consistency amongst their internal tools, but after they released it as an open-source project in 2011, it became *very* widely used. That wide use has benefits and drawbacks: it's very well tested, documented, and supported, but it's also so prevalent that it's default look has become cliché. Thankfully, it's rather easy to [customize Bootstrap](http://getbootstrap.com/customize/) with your own fonts, colors, sizing, etc.

Bootstrap is currently working on a [new version 4](http://v4-alpha.getbootstrap.com/) that promises to offer a Flexbox-based responsive grid, as well as a set of officially-supported themes.

### Foundation

Bootstrap's chief rival is [Foundation](http://foundation.zurb.com/). It has the reputation of being more ahead-of-the-curve than Bootstrap, introducing new features sooner. They were the first framework to use a responsive mobile-first design, and their new version 6 already offers a [flexbox-based responsive grid](http://foundation.zurb.com/sites/docs/flex-grid.html). Foundation has mostly the same UI elements as Bootstrap, but with a different default look at feel, which can also be [customized](http://foundation.zurb.com/sites/download.html/#customizeFoundation) to match your own branding.

### Material Design Lite

Bootstrap and Foundation defined their own design language, but if you are a fan of Google's [Material Design](https://material.google.com/), there are a few CSS frameworks based upon that. The official Google implementation is known as [Material Design Lite](https://getmdl.io/) (or MDL for short). Material Design is *very opinionated* so MDL is difficult to customize beyond changing the primary and accent colors, but the common Material Design UI elements are very easy to implement. Their style class names are also *very verbose*, as they follow the [Block, Element, Modifier](https://en.bem.info/methodology/) (BEM) naming method.

### Materialize

The other popular Material Design implementation is [Materialize](http://materializecss.com/). This is an open-source project, so it's not supported by Google, [nor does Google feel that it's a "correct" implementation](https://getmdl.io/faq/#existing-implementations) of Material Design. Regardless, a lot of people use it, primarily because it's easy to learn if you are coming from Bootstrap.

## Adding a Framework to your Page

Each framework has a getting started page that describes your various options for adding the framework to your HTML page. Nearly all of them will let you link to their production files on a Content Delivery Network (CDN), download them as a zip file, or add them to your project via a package manager like `npm` or `bower`. Each method has its benefits and drawbacks.

### Linking to a CDN

Linking to a CDN is a very easy option that has several benefits. The first is **simplicity**. For example, linking to Bootstrap's version 3.3.7 files on a CDN is as simple as adding these elements to the `<head>` section of your web page:

```html
<!-- Bootstrap v3.3.7 CSS stylesheet -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- jQuery library (required by Bootstrap's JavaScript library) -->
<script src="http://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>

<!-- Bootstrap v3.3.7 JavaScript library -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
```

<div class="alert alert-warning">Note that this loads version 3.3.7 specifically. Always check the <a href="http://getbootstrap.com/getting-started/#download-cdn">Bootstrap Getting Started page</a> to get the elements for their most current version.</div>

Simplicity is one benefit, but **download speed** is another. Content Delivery Networks are a set of web servers that can deliver commonly-requested content very quickly all over the world. CDNs replicate this content to machines in several regions of the world, and use dynamic Domain Name Service (DNS) resolution to steer users to the machine nearest them. So a user in Australia might download the Bootstrap CSS from a server located in Singapore, while a user in the France might get the same CSS file from a server located in Ireland. Although it often seems like the Internet is instantaneous, dragging files halfway around the world is still relatively slow. If the files are large, it can create a noticeable delay.

CDNs also increase perceived performance because the requested URL will be the same across various web sites that use the same file. The first time a user visits a site that uses this same URL, the CDN tells the browser that it can cache the file for a particular amount of time. The browser can also ask for the file content only if the file has been modified since the last time the browser downloaded it. Because the URL is the same between sites, it's very possible that a first-time user to your site has already downloaded your CSS framework files (especially if you use a popular framework like Bootstrap), and thus your site can render much faster.

A third benefit is **dynamic patching**. If the developers of your framework discover a bug that can be patched without breaking existing code, they can re-release the patched file to the CDN, and your users' will automatically pick it up the next time they visit your site.

The only drawback of linking to a CDN is that it won't work when you are offline. If you commonly do your development offline, or if you are building a web application that is meant to run offline, you must download the CSS framework files into your project directory using one of the other two methods.

### Downloading a Zip

The second method for adding a CSS framework is downloading the files as a zip and unpacking them into your project directory. As noted above, one primary benefit of this approach is that the framework files will be **available even when you are offline**. 

A second potential benefit is that framework sites often let you customize the contents of the zip, adjusting fonts, colors, etc. For example, Bootstrap's [customize page](http://getbootstrap.com/customize/) allows you to select only the components you need, and adjust base styling properties before downloading your customized zip file.

A third benefit is realized if you use the [Sass](http://sass-lang.com/) or [Less](http://lesscss.org/) CSS pre-compilers. These tools extend the CSS syntax to include features found in most other programming languages: variables, functions, inheritance, includes, mix-ins, etc. Most CSS frameworks are built using one of these two pre-compilers, and their **source files are commonly included in the downloaded zip**. You can then refer to these source files directly in your own Sass or Less code, including only the parts of the framework you actually plan on using. You can also override their standard fonts, colors, sizes, etc., simply by resetting their variables.

There are two main drawbacks to this method. First, it **adds large framework files to your code repository** that could easily be downloaded from the web as needed. Second, these **zips typically don't include other libraries that the framework depends upon**. For example, Bootstrap's JavaScript library requires the jQuery library, but that is not included in their distribution zip file. To eliminate both of these drawbacks, use a package manager.

### Using a Package Manager

Package managers are command-line programs that consult online directories of available packages, find all other packages a given package depends upon, and downloads all of them to your project directory. They also commonly record the set of packages your program is using in a special file that you can add to your project's code repository. This takes the guess-work out of determining the set of packages you need for a given framework, and makes it really simple for a new developer joining your project to get all the packages your project needs in order to run.

In the web development space, the most commonly-used package managers are [`npm`](https://www.npmjs.com/) and [`bower`](https://bower.io/). The former was originally created for the server-side Node.js environment, while the latter was a fork of the former, adjusted for client-side web development projects. Since then, `npm` has expanded to include both server and client-side packages, but it still has [some issues](http://blog.npmjs.org/post/101775448305/npm-and-front-end-packaging) when used for client-side projects, so let's see how we can use `bower` to install the Bootstrap CSS framework.

To use `bower` in a project, you first run this command within your project directory to create the file it uses to track meta-data about your project, including the packages your project depends on:

```bash
$ bower init
```

You can accept all the default values by hitting `Enter` after each prompt. After all the prompts are answered, it creates a file named `bower.json` to capture all the meta-data about your project. You should add, commit, and push this file to your code repository.

You can then install Bootstrap's files and record your dependency upon it using this command:

```bash
$ bower install --save bootstrap
```

This will download both the Bootstrap and jQuery packages (because Bootstrap depends on jQuery) to a new directory named `bower_components`. You can then include them in your page by adding these elements to your `<head>` section:

```html
<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
<script defer src="bower_components/jquery/dist/jquery.min.js"></script>
<script defer src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
```

When new developers join your project, they can quickly install all the packages listed in the `bower.json` file, as well as all of their dependencies, using this one command:

```bash
$ bower install
```

### Which is Best? CDN or Download?

If you ask a group of developers which is the better approach---linking to a CDN or downloading via a package manager---you'll probably start a very heated debate. It's kind of like the [spaces vs tabs](https://www.youtube.com/watch?v=SsoOG6ZeyUI) debate. Each method has its benefits and drawbacks, and neither option is clearly superior to the other. But choose you must, and your choice should be something you stick with. The one thing you don't want to do is mix the two approaches in one project.

If you are new to web development and can't decide which approach to use, link to the CDN version. It's simple and the lack of offline support probably won't affect you much.

## Responsive Layout Grids

At the core of all of these popular CSS Frameworks is a responsive grid layout system. These grids allow you to build multi-column layouts on all browsers, even those that don't support the new flexbox standard.

These grid systems divide the horizontal space into 12 equal columns. A given element can span as many of these columns as you want, but after 12 columns, the next element will wrap to the next line. Since 12 can be divided evenly by 6, 4, or 3, you can easily create layouts with 2, 3, or 4 equally-sized elements that sit next to each other on the same line. Or you can create one element that spans 4 columns and another that spans 8 columns.

The number of columns is specified using CSS style classes. For example, this markup uses Bootstrap to create three equally-sized elements on the same line on all screens:

```html
<div class="container">
	<div class="row">
		<div class="col-xs-4">
			<h2>Column 1</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
		</div>
		<div class="col-xs-4">
			<h2>Column 2</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
		</div>
		<div class="col-xs-4">
			<h2>Column 3</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
		</div>
	</div>
</div>
```
In Bootstrap, grids should always be put inside an element with `class="container"` or `class="container-fluid"`. Both of these style classes add a little padding to the left and right, and the `container` class sets the `max-width` property so that it doesn't grow ridiculously wide on large desktop monitors.

The `<div class=row>` element starts a row, and each `<div>` within that defines a new column. The style class `col-xs-4` tells Bootstrap that the element should consume 4 grid columns on extra-small screens and larger (`>=0px`), so all three of those `<div>` elements will appear side-by-side on all screen sizes. Here's what it looks like in the browser:

<p data-height="200" data-theme-id="dark" data-slug-hash="BzGXgk" data-default-tab="result" data-user="drstearns" data-embed-version="2" class="codepen">See the Pen <a href="http://codepen.io/drstearns/pen/BzGXgk/">Bootstrap Grid 1</a> by Dave Stearns (<a href="http://codepen.io/drstearns">@drstearns</a>) on <a href="http://codepen.io">CodePen</a>.</p>
<script async src="https://assets.codepen.io/assets/embed/ei.js"></script>

That's handy, but the real power comes when you want that layout to respond to the screen size, reverting to a single stacked set of elements on small phone screens. To do that, we just adjust the style classes:

```html
<div class="container">	
	<div class="row">
		<div class="col-sm-4">
			<h2>Column 1</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
		</div>
		<div class="col-sm-4">
			<h2>Column 2</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
		</div>
		<div class="col-sm-4">
			<h2>Column 3</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
		</div>
	</div>
</div>
```

Note that the `col-xs-4` classes became `col-sm-4`. By default, the `<div>` elements will stretch to fill the entire row and thus stack on top of each other, and the `col-sm-4` will only start to create the multi-column layout on small screens and larger (`>=768px`). Those `col-md-N` style classes are defined within a media rule block with the condition `min-width(768px)`, so they won't be applied until the screen size is at least `768px` wide. Here's what it looks like in the browser:

<p data-height="200" data-theme-id="dark" data-slug-hash="qNQZZW" data-default-tab="result" data-user="drstearns" data-embed-version="2" class="codepen">See the Pen <a href="https://codepen.io/drstearns/pen/qNQZZW/">Bootstrap Grid 2</a> by Dave Stearns (<a href="http://codepen.io/drstearns">@drstearns</a>) on <a href="http://codepen.io">CodePen</a>.</p>
<script async src="//assets.codepen.io/assets/embed/ei.js"></script>

Bootstrap also defines classes for `col-md-N`, which are in media rule blocks with the condition `min-width(992px)`, and `col-lg-N` classes, which are in media rule blocks with the condition `min-width(1200px)`.

You can also combine these classes to create different layouts on different sizes of screens:

```html
<div class="container">
	<div class="row">
		<div class="col-sm-4 col-md-4">
			<h2>Column 1</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
		</div>
		<div class="col-sm-8 col-md-4">
			<h2>Column 2</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
		</div>
		<div class="col-sm-12 col-md-4">
			<h2>Column 3</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
		</div>
	</div>
</div>
```

With this markup, the first column consumes 4 grid units on small and medium screens, the second column consumes 8 grid units on small screens but only 4 on medium screens, and the third consumes 12 units on small screens but only 4 on medium screens. On a small screens, the first two columns sit side-by-side, but the third wraps to the next line and stretches across the entire row.

<p data-height="200" data-theme-id="dark" data-slug-hash="mEabJR" data-default-tab="result" data-user="drstearns" data-embed-version="2" class="codepen">See the Pen <a href="https://codepen.io/drstearns/pen/mEabJR/">Bootstrap Grid 3</a> by Dave Stearns (<a href="http://codepen.io/drstearns">@drstearns</a>) on <a href="http://codepen.io">CodePen</a>.</p>
<script async src="//assets.codepen.io/assets/embed/ei.js"></script>

## Keep Learning

This has only scratch the surface of what you can do with a CSS framework like [Bootstrap](http://getbootstrap.com/css/), [Foundation](http://foundation.zurb.com/sites/docs/), [Materialize](http://materializecss.com/getting-started.html), or [Material Design Lite](https://getmdl.io/started/index.html). To learn more, see their respective documentation.

