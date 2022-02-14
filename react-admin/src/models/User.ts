export class User {
	constructor(
		public id = 0,
		public first_name = '',
		public last_name = '',
		public email = ''
	) {
	}

	get name() { //user.name di là
		return this.first_name + ' ' + this.last_name;
	}
}
