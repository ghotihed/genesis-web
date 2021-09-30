# genesis-web
This repository holds the various files and source code related to the Basingstoke Genesis science fiction club.

## Hosting
The web site is nominally hosted at https://genesis-sf.org.uk.

## A Little History
The Basingstoke Genesis Sci-fi club originally had a web site designed by Antony Walls. Management of the web site was later taken
over by Matthew Greet. It was designed and deployed in the early 2010's, and it hasn't really had much of a face-lift since then.
It doesn't look good on mobile devices. Also, it uses design choices that were cool and possibly even cutting-edge originally, but
now make the whole thing look stodgy and out of date.

To that end, a redesign has been in order for a while. A number of different people have looked at a number of different means
toward doing this. These include continuing a dynamic type of site with something like Wordpress, to a static type of site. For
the types of things that tend to be posted to the web site, it seems like a static site makes more sense. But rather than
try to reinvent the wheel and hand-tool all of it, a static site generator should take a lot of the sting out of building
the site.

To that end, a few different generators have been considered. For a while, [Hugo](https://gohugo.io/) was considered, but it
seemed to have a few problems with its generation, and it felt like it was a bit more complicated than it needed to be with
fewer customisation abilities. The current thinking is to go with [Jekyll](https://jekyllrb.com/). There is a `jekyll` branch
for those experiments.

If anybody wants to try a different technology (or give Hugo another try), please get in touch with the administrator about
setting up a different branch for you to experiment with.

## Branches
There are three official branches. Each of these require a pull request to be made in order to merge with them.

### `main`
This will eventually hold the primary, official version of the web site. This will happen once a completed _new world order_ version
is completed and ready for publishing.

### `orig`
A snapshot of the original, old-style version of the web site is stored in the `orig` branch. While the newer version of the
web site is being developed, any changes to the existing site should be made here. These will then be manually published to
the official web site.

### `jekyll`
The `jekyll` branch holds the changes related to the revamping of the web site. This will be done
using the static web site generator [Jekyll](https://jekyllrb.com/). No specific time frame for completing this work this has
been set, but it's where we'd like to go moving forward. If and when the `jekyll` branch gets to a stable point<sup>1</sup>,
it will be applied to the `main` branch, and the hosted web site will be updated to follow.

## Contributions
If you wish to contribute, please create your personal branch off the appropriate `orig` or `jekyll` or `main` branches.
When you have completed your changes, you will need to generate a Pull Request and get approval before merging into one
of those other branches. You will find a more detailed description of how to make changes
in the [Changes document](CHANGES.md).

---
<sup>1</sup> The definition of _stable point_ for any particular branch will be decided by the Genesis committee.
