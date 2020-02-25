$(function() {
	let mainContainer = $('div.index.page');
	let allTabs = mainContainer.find('a.tab');
	let pageName = mainContainer.find('span.page-name').text();
	let currentTab = mainContainer.find('a[href="http://localhost/show_flow_course_project/' + pageName + '"].tab');

	let sidepanel = mainContainer.find('nav.main-menu');
	let openBtn = mainContainer.find('button.open-btn');
	let closeBtn = mainContainer.find('a.close-btn');

	//Class 'active' on tabs in main menu
	allTabs.removeClass('active');
	currentTab.addClass('active');

	//Open and close sidepanel on small devices
	openBtn.click(function() {
		sidepanel.removeClass('closed-sidepanel');
		sidepanel.addClass('open-sidepanel');
	});

	//Click on X do close sidepanel
	closeBtn.click(function() {
		sidepanel.removeClass('open-sidepanel');
		sidepanel.addClass('closed-sidepanel');
	});

	//Click anywhere out of sidepanel to close it
	$(document).mouseup(function(e) {
		if (!sidepanel.is(e.target) && sidepanel.has(e.target).length === 0) {
			sidepanel.removeClass('open-sidepanel');
			sidepanel.addClass('closed-sidepanel');
			sidepanel.unbind('mouseup', $(document));
		}
	});
});