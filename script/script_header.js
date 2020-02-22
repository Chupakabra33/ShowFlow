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
		sidepanel.css('width', '250px');
	});

	//Click on X do close sidepanel
	closeBtn.click(function() {
		sidepanel.css('width', '0');
	});

	//Click anywhere out of sidepanel to close it
	$(document).mouseup(function(e) {
		if (!sidepanel.is(e.target) && sidepanel.has(e.target).length === 0) {
			$(this).css('width', '0');
			sidepanel.unbind('mouseup', $(document));
		}
	});
});