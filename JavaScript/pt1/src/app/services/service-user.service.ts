import { Injectable } from '@angular/core';
import { User } from '../model/User';
import { CookieService } from 'ngx-cookie-service';

@Injectable({
  providedIn: 'root'
})
export class ServiceUserService {
  constructor(private cookieService: CookieService) {}
	UsersArray: User[] = [];
 	roles = ['Buyer', 'Administrator'];
	estadosCiviles = ['Single', 'Married', 'Divorced'];
	genero = ['Man', 'Woman', 'Other'];
	informacion = ['Musica', 'Accesorios', 'Ropa'];

	getUsers() {
		if (this.UsersArray.length === 0) {
			for (let i = 0; i < 50; i++) {
				let j = Math.floor(Math.random() * 3);
				let k = Math.floor(Math.random() * 2);
				let l = Math.floor(Math.random() * 3);
				let m = Math.floor(Math.random() * 3);
				let n = Math.floor(Math.random() * 3);
				switch (j) {
					case 0:
					this.UsersArray.push(new User('user' + (i + 1), 'pass' + (i + 1), this.roles[k], 'user' + (i + 1) + '@gmail.com', this.estadosCiviles[l], this.genero[m], this.informacion[n], 'True'));
					break;
					case 1:
					this.UsersArray.push(new User('user' + (i + 1), 'pass' + (i + 1), this.roles[k], 'user' + (i + 1) + '@gmail.com', this.estadosCiviles[l], this.genero[m], this.informacion[n], 'True'));
					break;
					case 2:
					this.UsersArray.push(new User('user' + (i + 1), 'pass' + (i + 1), this.roles[k], 'user' + (i + 1) + '@gmail.com', this.estadosCiviles[l], this.genero[m], this.informacion[n], 'True'));
					break;
				}
			}
		}
		console.log(this.UsersArray);
	}

	validateUser(userAuth: any, passAuth: any): string {
		let role = '';
		this.UsersArray.forEach(user=> {
		  if (user.username === userAuth && user.password === passAuth) {
			role = user.role;
			this.cookieService.set('username', user.username);
			this.cookieService.set('role', user.role);
		  } 
		});
		return role;
	}
  registerUser(user2reg: User): any {
    this.UsersArray.push(user2reg);
  }
}
