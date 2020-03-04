$(function() {
	let mainContainer = $('div.index.page');
	let toTopBtn = mainContainer.find('span.fa-arrow-circle-up');
	let allTabs = mainContainer.find('a.tab');
	let pageName = mainContainer.find('span.page-name').text();
	let currentTab = mainContainer.find('a[href="http://localhost/show_flow_course_project/' + pageName + '"].tab');

	let sidepanel = mainContainer.find('nav.main-menu');
	let openBtn = mainContainer.find('button.open-btn');
	let closeBtn = mainContainer.find('a.close-btn');

	let logoutForm = mainContainer.find('form.logout-form');

	// Add the 'icon-hide' class initially to the 'scroll to top' button
	if ($(window).scrollTop() < 1) {
		toTopBtn.removeClass('icon-show').addClass('icon-hide');
	}

	//Hide or show 'scroll to top' button on window scroll
	$(window).scroll(function() {
		if ($(this).scrollTop() > 200) {
			toTopBtn.removeClass('icon-hide').addClass('icon-show');
		} else {
			toTopBtn.removeClass('icon-show').addClass('icon-hide');
		}
	});

	//Scroll to top button functionality
	toTopBtn.click(function() {
		$('html, body').scrollTop(0);
		return false;
	});

	//Class 'active' on tabs in main menu
	allTabs.removeClass('active');
	currentTab.addClass('active');

	//Open and close sidepanel on small devices
	openBtn.click(function() {
		sidepanel.removeClass('closed-sidepanel').addClass('open-sidepanel');
	});

	//Click on X do close sidepanel
	closeBtn.click(function() {
		sidepanel.removeClass('open-sidepanel').addClass('closed-sidepanel');
	});

	//Click anywhere out of sidepanel to close it
	$(document).mouseup(function(e) {
		if (!sidepanel.is(e.target) && sidepanel.has(e.target).length === 0) {
			sidepanel.removeClass('open-sidepanel').addClass('closed-sidepanel');
			sidepanel.unbind('mouseup', $(document));
		}
	});

	//Display different top space on sidepanel depending on login and logout
	if (logoutForm.length > 0) {
		sidepanel.removeClass('position-for-login').addClass('position-for-logout');
	} else {
		sidepanel.removeClass('position-for-logout').addClass('position-for-login');
	}
});