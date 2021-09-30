# Changing the Repository

While this page can, in no way, replace a full lesson in how to use [Git](https://git-scm.com/),
it will give a basic guide on how to make changes to the `genesis-web` repository.
This will start with a general description of branches and what they mean, followed
by a step-by-step procedure of how to go about making changes. It is intended for
people new to using Git and GitHub, who nevertheless which to make contributions to
this repository.

## Branches

In Git parlance, repositories are set up with different branches. The main one is
typically named the `main` branch. Though it could technically have a different name,
I'm not sure I've ever personally encountered that situation.

Different branches can have widely different set of files in them.

At the time of this writing, the following 'official' release branches exist for this
repository:

 * `main` - the primary branch where default set of files goes. At the moment, this branch
is not being used.
 * `orig` - the original, non-tracked web site. This is currently the primary branch that
reflects the contents of the actual web site.

There may also be a few experimental branches, such as `jekyll` or `deployment-script`
that are used for development purposes.

## Step-by-step

While the general methodology described here will be applicable to whichever
set of Git tools one uses, the examples will all be done via the command-line interface.

Why? Because that's the interface the author of this page knows and primarily uses.
Other tools available include plugins to various popular IDEs such as
[Visual Studio Code](https://code.visualstudio.com/)
or the various [JetBrains](https://www.jetbrains.com/) tools such as PyCharm or
WebStorm. There is also a dedicated [GitHub Desktop](https://desktop.github.com/)
available for MacOS or Windows.

### Sign up for GitHub

While you don't need to have a GitHub account in order to simply view the contents of
the repository, you will not be able to make any changes unless you have first signed
up with your own GitHub account. Just go to the main [https://github.com/](https://github.com/)
page and click the `Sign up` button in the upper right. Follow their procedures to get
yourself in place.

### Get a copy of the repository

The first step, of course, is to make sure you have a copy of the repository on your
own computer system:

```shell
$ git clone git@github.com:ghotihed/genesis-web.git
```

This will download the entire repository from the central GitHub server (known as
`origin`) and make a copy of it on your own personal system.
A new subdirectory called `genesis-web` will be created off the current directory and
the contents of the repository will be placed in there. For the rest of the steps,
you'll want to be working within that directory:

```shell
$ cd genesis-web
```

### Start from the proper branch

At the time of this writing, the branch used for updating the publicly-exposed web page
is called `orig`. You will want to make sure that your current branch is set to this:

```shell
$ git checkout orig
```

After this command completes, the contents of the directory will be modified to contain
the files associated with the `orig` branch. These are the contents that are reflected
directly in the `public_html/` folder on the web page.

This branch will now act as your *base* branch. Whenever you create a new branch, if you
make sure you're in this `orig` branch, your new one will be based off of it.

### Create a working branch

When you're ready to try making some changes, you will first need to create your own
*working* branch. This will insulate any changes you make from any release branch. It
also means that you can mess up as much as you want. So long as you don't actually try
to merge your changes into a released branch, you can always wipe your changes and
revert to the release branch.

There are actually two commands you need to do for creating your working branch: create
the actual branch, switch to the branch. But, because it's such a common thing to do
in most workflows, there is a way to combine those two operations in one command line:

```shell
$ git checkout -b my-working-branch
```

This will create a new branch called `my-working-branch` and automatically check it out,
which is Git's way of switching to that branch.

> **Ob branch names:** please try to be properly descriptive, though brief, in your branch
> names. Also, please use all lower-case, separated by hyphens. So, for example, if
> you are adding a section about visiting the Foobar Festival, your branch might
> be named `add-foobar-festival-section`. Or perhaps you are changing some style elements
> so the web page looks better, in which case you might call it `update-css-elements`.
> You will have a chance to add more text describing what's actually going on in
> the branch when you're ready to submit it for review.

### Make your changes

Here's where you muck around with the files that make up the web site. It can be as
much or as little as you care to do. The main web page (in the `orig` branch) is served
from the `index.php`. That's a good place to start.

As for testing your changes, I would recommend setting up some sort of server that allows
you to view your changes. My personal setup involves a Linux system (WSL2 running Ubuntu
under Windows) with an Apache2 server set up, pointing at `~/src/genesis-web` development
directory (where I store my Git repository). That means I can view my changes by pointing
a browser at `~localhost`.

But, of course, your mileage may vary.

### Committing your changes

When you come to a logical stopping point in your changes, it will be time to *commit*
it to the repository. This commit is basically just a collection of the changes into a
single unit that can be used to track those changes. It also allows people to add and
remove changes as needed.

There comes a question of what a logical stopping point for your changes might be.
There are a lot of opinions on this matter. My opinion is one of 'commit early, commit
often'. If you've got a big set of changes to make, it can make more sense to split
those up into smaller changes and more commits. These smaller commits can then be
collected into a Pull Request (more information on that later) for integration into
the main code base.

Of course, if the change you're making is a simple one, just as just changing a few
lines of one or two files, then you likely will only have a single commit to make,
not a bunch of smaller ones. As a general rule, it's best to make your commits
fully self-contained. In a programming context, you shouldn't commit anything that
doesn't at least compile.

The creation of the commit doesn't mean sending it up the line to the GitHub server,
it means saving it locally in the branch on your machine. We'll send it up to the central
GitHub server later. In the meantime, there are a number of steps to perform when
generating a commit.

#### See what's been changed

You can get a look at what's been changed so far by using the following command:

```shell
$ git status
```

This will provide a fairly verbose look at the status of any changes. It will show
you which files have been changed, which files have been newly added, etc. Personally,
I like to use a few command-line parameters to get a more condensed view of the current
status. In fact, I use it so much I've created a small shell script for it:

```shell
git status -b -s $*
```

This says to show the current branch (`-b`) and display things in the short (`-s`) format.
The `$*` at the end says to append the rest of the initial command-line that was part
of the call to `gitstat` as part of the call to the `git` command.

#### Looking for differences

An extremely useful command at this point, in addition to finding out the status of
various files, is to look at the differences in those that have been changed. For this,
you use the `git diff` command. If the results of performing the status check above
shows that the `index.php` file has had some changes, then you can run:

```shell
$ git diff index.php
```

You will see a list of the changes that have been made in the standard Linux-style
*diff* format. Here's where some form of graphical application such as the GitHub
Desktop or an IDE integration can be useful for
viewing the changes in a more friendly manner. Either way, this is a good time to
review your changes and make sure they're what you intended.

#### Stage your changes

The first step is to mark your changes as valid for saving into the repository. This is
called *staging*. This says that the changes you've made should be included when they
are committed to the repository. This is done with the `git add` command. So, for example,
if you've made modifications to the `index.php` file, then you will need to stage it
for committing:

```shell
$ git add index.php
```

Similarly, if you've added a new file that needs to be included in the commit, you'll
need to stage that, as well.

#### Commit your changes

Once you're finished staging all of the changes that you want included in the commit,
you can finally perform the actual commit:

```shell
$ git commit
```

This will take all the changes that you've staged and form a commit out of them.
As part of the commitment process, you will be asked to enter a commit message. This
can be a very important way ot communicating to others the nature of your change.
Here's your opportunity to be verbose and talk about the nature and intent of what's
being done in the commit.

#### Save your changes on the GitHub server

One of the big advantages of having a central server is that if there are any problems
on your local machine - such as a hard-drive failure or a tornado or something - all
of your work is backed up. Since you've already placed your commits into a separate
branch, you don't have to worry about interfering with the actual release branch
or with anybody else's changes.

In order to push your changes to the GitHub server, you need to send it to the `origin`:

```shell
$ git push origin
```

If this is the first time you've pushed on your new branch, this will create a
corresponding branch on the server and link your local branch with the one on the
server. You should make it a habit to push your commits to the server for backup
purposes. If you later change your mind and decide to abandon the branch, this
can always be deleted both locally and on the server.

## Pull Requests

When you think you've completed all the changes you intend to make, and you're ready
for others to review your work, it's time to generate a Pull Request. At this point,
you're off the command line. You'll be working with GitHub directly, either via the
GitHub Desktop application or by logging into `github.com` with your web browser.

> I don't personally have the GitHub Desktop installed. All of my experience is with
> the actual website. All further mentions here are based on accessing GitHub via
> the website.

### Creating a Pull Request

When you visit the page for the repository, you'll have the ability to generate a
Pull Request. You might even be prompted to do so, if your latest commit was recent
enough.

A Pull Request is a collection of commits that have been collected into a single
branch for potential merging into a different branch. In this case, we are interested
in generating a Pull Request to have your latest branch merged into a release branch.

When generating the Pull Request, it will default to having its target merge as the
`main` branch, but we will want to send it to the `orig` branch. You will need to
take care to set the target merge branch appropriately. When things are set properly,
a visual diff of the changes will be provided. Here's another opportunity for you
to look at all the changes and make sure they match what you expect.

You should also set some people up to review the commit. You'll see a location for
adding reviewers of the commit. This is important. You should never let your changes
be merged into a release repository without first having others review your work.
Absolutely *everybody* makes mistakes. When you're so close to the problem, you will
make mistakes, as well. Hopefully, others will notice them and help you to fix them.

You will also have space to fill in some details about the nature of the Pull
Request. Much like the comments you made for individual commits, this is your
opportunity to explain in further detail what the purpose of the Pull Request is and
prepare anybody who reviews it with its nature.

When you're ready, submit your Pull Request. The reviewers will be notified, and they
will have a chance to make sure everything is good.

### Reviewing a Pull Request

If you are a reviewer, a simple change can likely be just viewed on the website
and checked for errors. If the changes are a little more complicated (e.g., if they
maybe make some changes to the style sheets or something) it would be a good idea
to download the Pull Request and check the changes for yourself in a browser. If you
don't have the ability to do the latter, then just do a visual check of the code
online.

If, when performing your review, you encounter any portion of the changes that you
think doesn't work, then you should mark up that line with your questions or your
thoughts about why it's wrong, and submit that query to the original author.

### Updating a Pull Request

If a reviewer found an issue with something in your Pull Request that needs to
be addressed, or possibly because you thought of something that should have been
there in the first place, then you may need update the Pull Request.

If you're the only one working on the Pull Request, then this will be a simple
matter of making whatever necessary change you need within the working branch
that's associated with the Pull Request, generate a commit with those changes,
then push them to the server. The Pull Request will automatically be updated.

Note that if any of the reviewers approved your Pull Request before you made the
new commit, that approval will be removed, and the reviewer will have to look
at the Pull Request again.

### Merging the Pull Request

For the moment, all merging should be done by the administrator of the repository.
If one or more of the reviewers approve the Pull Request, it will be merged by the
administrator and the resulting branch will be uploaded to the public website.

Note that the branch used to generate the Pull Request will likely be deleted from
the server when it is merged into a release branch. That's because the work branch
will no longer be needed.

## Synchronising your local repository

When the Pull Request has been merged into the release branch, you will want to
update your local repository with the changes from the GitHub server. There are a
number of ways to do this, but the one I've found to be most effective is to follow
this recipe:

```shell
$ git fetch --app -p
$ git checkout orig
$ git pull origin
$ git branch -d my-working-branch
```

The first line fetches all the changes from the GitHub server to your local
repository on your local machine. The first parameter says to fetch from all
remotes (in this case, there's only the one remote: `origin`, but there could
potentially be others someday - however unlikely that might be). The second parameter
says to prune tags. We aren't using tags on this repository yet, but if we do later,
this will become an important parameter to make sure that the tags get updated
properly.

The second line switches your current branch to the `orig` branch. Note that this
doesn't reflect the server, yet. It only reflects what was on your local
machine before.

The third line actually pulls the remote's version of the current branch into the
current visible branch. This is when you will have a complete reflection of the
contents of the server for you to look at.

The fourth and final line deletes your local version of your working branch. The
`local-working-branch` name on this line should match the name you used earlier
when creating your working branch and making a Pull Request with it. If the
working branch has been deleted on the GitHub server during the merge, then this
last line allows you to keep a clean repository. If, for some reason, the working
branch was *not* deleted, then you should not execute this final line that deletes your
local branch, unless you no longer have any use for it.

## Conclusion

When all is said and done, this is a very stripped-down version of the procedures you
should take to make changes to the repository. You should really use this only in
conjunction with a more thorough investigation into how to use Git and GitHub.
Hopefully, though, this will have provided you with a framework for beginning to make
your own changes to the repository.