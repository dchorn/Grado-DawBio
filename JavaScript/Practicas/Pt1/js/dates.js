Date.isLeapYear = function (year) {
	return (((year % 4 === 0) && (year % 100 !== 0)) || (year % 400 === 0));
};

Date.getDaysInMonth = function (year, month) {
	return [31, (Date.isLeapYear(year) ? 29 : 28), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][month];
};

Date.prototype.isLeapYear = function () {
	return Date.isLeapYear(this.getFullYear());
};

Date.prototype.getDaysInMonth = function () {
	return Date.getDaysInMonth(this.getFullYear(), this.getMonth());
};

Date.prototype.addMonths = function (value) {
	var n = this.getDate();
	this.setDate(1);
	this.setMonth(this.getMonth() + value);
	this.setDate(Math.min(n, this.getDaysInMonth()));
	return this;
};

Date.prototype.subMonths = function (value) {
	var n = this.getDate();
	this.setDate(1);
	this.setMonth(this.getMonth() - value);
	this.setDate(Math.min(n, this.getDaysInMonth()));
	return this;
};

function minMaxDates(ID, months) {
	var from = document.getElementById(ID);
	var maxDate = new Date();
	maxDate.addMonths(months);
	var dd = maxDate.getDate();
	var mm = maxDate.getMonth();
	var y = maxDate.getFullYear();

	var minDate = new Date();
	minDate.subMonths(months);
	var ddm = minDate.getDate();
	var mmm = minDate.getMonth();
	var ym = minDate.getFullYear();

	var newFormat = y.toString().padStart(4, '0') + '-' + mm.toString().padStart(2, '0') + '-' + dd.toString().padStart(2, '0');

	var newFormatMin = ym.toString().padStart(4, '0') + '-' + mmm.toString().padStart(2, '0') + '-' + ddm.toString().padStart(2, '0');

	from.setAttribute("max", newFormat);
	from.setAttribute("min", newFormatMin);
}

