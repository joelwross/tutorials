# Tutorials Project

This repo contains various tutorials I've written for my courses at the University of Washington Information School. But it's also a general framework that anyone can use for their own tutorials as well.

## Fork for Your Own Use

To use this for your own tutorials, fork the project, and replace the tutorial directories under `src/` with your own. The `src/template.html` file is the main HTML template, and it's processed using [Handlebars](http://handlebarsjs.com/). The `src/css/`, `src/lib/` and `src/img/` directories are for stylesheets, library files, and images that are global to all tutorials.

Each tutorial should be in its own directory under `src/` and the tutorial itself can be written as an HTML fragment (`.html`), or as a Markdown file (`.md`). Supporting images should be put in a `/src/your-tutorial/img/` directory under your tutorial directory. To provide meta-data for the tutorial, create a file named `meta.json` in the tutorial directory, with the following format:

```json
{
    "title": "My Tutorial Title",
    "subtitle": "An optional tutorial subtitle"
}
```

This metadata is used not only by the tutorial template, but also by the table of contents page. Speaking of which, the `src/contents.json` file determines which tutorials show up in the contents page, and in what order. This file should contain an array of tutorial directory names (just the directory name, not the full path).

## Building the Tutorials

To build your tutorials, you will need [Node.js](https://nodejs.org/en/download/) and [the Gulp CLI](https://github.com/gulpjs/gulp/blob/master/docs/getting-started.md). After those are installed, you can get all the dependencies using `npm install`:

```bash
$ npm install
```

Then you can build the tutorials using `gulp`:

```bash
$ gulp
```

This will build the tutorials to the `dist/` directory, creating the directory if necessary. Markdown tutorials will be converted to HTML, and all HTML will be merged with the `src/template.html`. Images will be compressed, CSS files will be auto-prefixed and minified, and HTML files will be minified.

## Deploy to Web Server

To deploy the contents of the `dist/` directory to a web server using `rsync`, run the `deploy.sh` script, passing the target location. For example, to deploy to a UW faculty web host, run a command like this from the project root, replacing `your-net-id` with your UW NetID, and `path/to/folder` with the target path on your web host:

```bash
$ ./deploy.sh your-net-id@ovid.u.washington.edu:public_html/path/to/folder
```

This uses [`rsync`](http://linux.die.net/man/1/rsync), which will copy over only the files that have changed since the last sync.
