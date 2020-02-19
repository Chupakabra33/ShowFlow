//Class 'active' on tabs in main menu
$(function() {
	let mainContainer = $('div.index.page');
	let allTabs = mainContainer.find('a.tab');
	let pageName = mainContainer.find('span.page-name').text();
	let currentTab = mainContainer.find('a[href="http://localhost/show_flow_course_project/' + pageName + '"].tab');

	allTabs.removeClass('active');
	currentTab.addClass('active');
});