function selectMenu(menuId) {
    var menu;



    menu = document.getElementById(menuId);

    menu.className = menu.className + ' here';


    if (menuId.substring(0,7) == 'aboutUs') {
        toggleMenuGroup('aboutUsMenuGroup');
    } else if (menuId.substring(0,8) == 'upcoming') {
        toggleMenuGroup('upcomingMenuGroup');
    } else if (menuId.substring(0,6) == 'review') {
        toggleMenuGroup('reviewMenuGroup');
    } else if (menuId.substring(0,7) == 'ourWork') {
        toggleMenuGroup('ourWorkMenuGroup');
    } else if (menuId.substring(0,5) == 'links') {
        toggleMenuGroup('linksMenuGroup');
    } else if (menuId.substring(0,7) == 'archive') {
        toggleMenuGroup('archiveMenuGroup');
    }
    if (menuId.substring(0,12) == 'ourWorkAAndE') {
        toggleMenuGroup('ourWorkAAndEMenuGroup');
	}
    if (menuId.substring(0,11) == 'archiveNews') {
        toggleMenuGroup('archiveNewsMenuGroup');
	}
    if (menuId.substring(0,30) == 'archiveOurWorkTheUniverseToday') {
        toggleMenuGroup('archiveOurWorkTheUniverseTodayMenuGroup');
	}
    if (menuId.substring(0,20) == 'archiveUpcomingBooks') {
        toggleMenuGroup('archiveUpcomingBooksMenuGroup');
	}
    if (menuId.substring(0,21) == 'archiveUpcomingCinema') {
        toggleMenuGroup('archiveUpcomingCinemaMenuGroup');
	}
    if (menuId.substring(0,18) == 'archiveUpcomingDVD') {
        toggleMenuGroup('archiveUpcomingDVDMenuGroup');
	}
    if (menuId.substring(0,21) == 'archiveUpcomingEvents') {
        toggleMenuGroup('archiveUpcomingEventsMenuGroup');
	}
    if (menuId.substring(0,20) == 'archiveUpcomingGames') {
        toggleMenuGroup('archiveUpcomingGamesMenuGroup');
	}
    if (menuId.substring(0,17) == 'archiveUpcomingTV') {
        toggleMenuGroup('archiveUpcomingTVMenuGroup');
	}

}

function toggleMenuGroup(menuGroupId) {
    var menuGroup;

    menuGroup = document.getElementById(menuGroupId);

    if (menuGroup.style.visibility = 'hidden') {
        menuGroup.style.visibility = 'visible';
        menuGroup.style.height = 'auto';
    } else {
        menuGroup.style.visibility = 'hidden';
        menuGroup.style.height = '0px';
    }
}

