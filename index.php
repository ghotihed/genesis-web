<!doctype html>
<html lang="en">

<?php
    $page_title = "Genesis Sci-Fi Club";
    include("includes/html-header.php");
    include("libs/meetings.php");
    include("libs/conventions.php");

    $meetings = new Meetings();
    $conventions = new Conventions();
?>

<body>
    <?php include("includes/header-banner.php"); ?>

    <img class="page-logo" src="/images/genesis-logo-white.png" alt="Genesis logo"/>

    <div class="page-title">
        <img src="/images/genesis-banner-name.png" width="800px" alt="Genesis banner name"/>
        <h1>Welcome to Genesis Sci-fi Club</h1>
        <h2>The Basingstoke science fiction club</h2>
    </div>

    <div class="content">
        <p>
            Genesis is the science fiction and genre club originally based in Basingstoke, United
            Kingdom. We share a love for all things genre-related from science fiction to fantasy
            to horror to science to space exploration. Basically, just your typical sci-fi club.
        </p>
        <p>
            In the past, we would meet once a month to talk about genre-related items, watch media,
            engage in a quiz, etc. But over the course of the pandemic, the Genesis club accumulated
            a number of members who cannot attend in-person (usually because they're too far away,
            some by multiple thousands of miles). As a result, the regular Genesis meetings are
            currently being held online using the Zoom platform. The same goes for the book club
            meetings. Connection information will be posted here, and on social media (hopefully)
            no later than an hour before the meeting starts.
        </p>
        <p>
            As for in-person meetings, we try to get together once per month at a venue for
            table-top gaming. At the moment, that venue is the
            <a href="https://www.dicetowercafe.co.uk/" target="_blank">Dice Tower gaming cafe</a>
            located in Basingstoke. The scheduled meetups are posted here, as well.
        </p>

        <p>
            Many of us also like to attend related conventions such as Worldcons, Eastercons,
            ArmadaCons, etc. You'll find a small list of items below where Genesis members are
            known to be attending.
        </p>
    </div>

    <h1 class="meetings-list-title">Upcoming Meetings</h1>
    <div class="meetings-list content">
        <p>The next scheduled meetings are as follows:</p>
        <ul>
            <?php $meetings->print(); ?>
       </ul>
    </div>

    <h1 class="conventions-list-title">Upcoming Conventions</h1>
    <div class="conventions-list content">
        <p>
            The following conventions are coming up. Various Genesis members will be attending them.
            For more information, visit their respective websites.
        </p>

        <?php $conventions->createTable(); ?>
    </div>

    <?php $top_file = __FILE__; include("includes/footer.php"); ?>
</body>
</html>
