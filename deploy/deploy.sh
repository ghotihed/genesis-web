#!/bin/sh

# This will collect the changes from the previous FTP upload,
# connect to the FTP server, upload those changes, then modify
# the local file with the new hash.
#
# TODO Rewrite this in Python so Windows people can use it.

# TODO Add command-line arguments for FTP site, hash to use, etc.

FTP_SITE="genesis-sf.org.uk"
FTP_ROOT="/public_html"

# TODO Investigate using sftp and key authentication, instead of ftp auto-login.
# This should make things easier for people running in Windows.

# First verify that a .netrc is available and set up properly,
# because we're going to rely on that for login authentication,
# rather than potentially storing credentials in the git repo.
if [ ! -e ~/.netrc ]; then
    echo "Autologin file ~/.netrc not found." >&2
    exit 1
fi

if [ -z "$(grep $FTP_SITE ~/.netrc)" ]; then
    echo "Login information for $FTP_SITE not found in ~/.netrc." >&2
    exit 1
fi

if [ ! -z "$(stat -Lc "%A" ~/.netrc | cut -c 5,8 | grep "r")" ]; then
    echo "~/.netrc must be readable only by user." >&2
    exit 1
fi

# Figure out where our last-hash file should be.
LAST_HASH_FILE="$(dirname $0)/last.hash"
if [ ! -e "$LAST_HASH_FILE" ]; then
    echo "You must have a valid $LAST_HASH_FILE file. To create it, you must" >&2
    echo "first determine the hash for the last git commit that was deployed" >&2
    echo "to the web site and place it in the file." >&2
    exit 1
fi

# Read in the hash of the last commit that was uploaded to the server.
LAST_HASH=`cat $LAST_HASH_FILE`

# Get information from git.
LOCAL_ROOT=`git rev-parse --show-toplevel`
HEAD_HASH=`git rev-parse HEAD`
CHANGES=`git diff --name-only $LAST_HASH $HEAD_HASH`
NEW_DIRS=`git diff-tree $LAST_HASH $HEAD_HASH | cut -f 5 -d ' ' | grep ^A | cut -f 2`

if [ -z $CHANGES ]; then
    echo "Nothing to do." >&2
    exit 0
fi

# Show the changes before we send them.
echo "The last hash was $LAST_HASH"
echo "Current HEAD is   $HEAD_HASH"
if [ ! -z "$NEW_DIRS" ]; then
    echo 'Found the following new directories:'
    for i in $NEW_DIRS; do echo "    $i"; done
fi
echo 'Found the following new/changed files:'
for i in $CHANGES; do echo "    $i"; done

# TODO Ask user if they're sure.

FTP_SCRIPT="passive\nbinary"
# TODO Handle new directories
for i in $CHANGES; do
    FTP_SCRIPT="$FTP_SCRIPT\ncd $FTP_ROOT/$(dirname $i)\nlcd $LOCAL_ROOT/$(dirname $i)\nput $(basename $i)"
done
FTP_SCRIPT="$FTP_SCRIPT\nbye"

# TODO Connect to the FTP server. Exit the script if it fails.
#ftp -i $FTP_SITE <<END_SCRIPT
#$FTP_SCRIPT
#END_SCRIPT
echo "\nHere is the script to send:\n-----"
echo "ftp -i $FTP_SITE"
echo $FTP_SCRIPT
echo "-----"

# TODO Update the local hash file.
#echo $HEAD_HASH > $LAST_HASH_FILE
