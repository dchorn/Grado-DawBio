import { Component } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { ServiceUserService } from 'src/app/services/service-user.service';
import { CookieService } from 'ngx-cookie-service';

@Component({
  selector: 'app-compo2',
  templateUrl: './compo2.component.html',
  styleUrls: ['./compo2.component.scss']
})
export class Compo2Component {
constructor(private serviceUser: ServiceUserService, private cookieService: CookieService) {}

	message: string = '';
	name: string = '';
	role: string = '';

	LoginForm = new FormGroup({
		username: new FormControl('', Validators.required),
		password: new FormControl('', Validators.required)
	});

	submit(): void {
		this.serviceUser.getUsers();
		this.serviceUser.validateUser(this.LoginForm.value.username, this.LoginForm.value.password);
		this.serviceUser.validateUser(this.LoginForm.value.username, this.LoginForm.value.password);
		this.role = (this.serviceUser.validateUser(this.LoginForm.value.username, this.LoginForm.value.password));
		this.message = this.role;
		this.name = this.cookieService.get('nombre');
		this.role   = this.cookieService.get('role');
	}
	checkCookie() {
		return document.cookie.split(';').some(item => item.includes('username='));
	}
	logout() {
	// Eliminar cookie
		document.cookie = 'username=; expires=Thu, 01 Jan 1970 00:00:00 UTC;';
	}
}
