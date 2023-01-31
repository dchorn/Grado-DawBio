import { Component } from '@angular/core';
import { ServiceUserService } from 'src/app/services/service-user.service';
import { FormGroup, FormControl, Validators } from '@angular/forms';

import { User } from 'src/app/model/User';

@Component({
  selector: 'app-compo3',
  templateUrl: './compo3.component.html',
  styleUrls: ['./compo3.component.scss']
})
export class Compo3Component {
  constructor(private serviceUser: ServiceUserService) {}

  //Init vars
  registerUserData!: User;
  result = '';


  //Form selects
  estado     = ['Married', 'Single', 'Divorced'];
  informacio = ['Games', 'Anime', 'Books'];

  myForm = new FormGroup({

    username: new FormControl('', [
      Validators.required,
      Validators.minLength(6),
      Validators.pattern('^[A-Za-zñÑáéíóúÁÉÍÓÚ ]+$'),
    ]),

    correo: new FormControl('', [
      Validators.required,
      // Validators.email
      Validators.pattern(
        "^[a-z0-9!#$%&'+/=?^_`{|}~-]+(?:.[a-z0-9!#$%&'+/=?^_`{|}~-]+)@(?:[a-z0-9](?:[a-z0-9-][a-z0-9])?.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$"
      ),
    ]),

    password: new FormControl('', [
      Validators.required,
      Validators.minLength(8),
    ]),

    passwordrepeat:  new FormControl('', [Validators.required]),
    sexe:            new FormControl('', [Validators.required]),
    checkcondicions: new FormControl('', [Validators.required]),
    estat:           new FormControl('', [Validators.required]),
    info:            new FormControl('', []),
  });
  
  submit(): void {
    //solo si clicas
    this.registerUserData = new User(
      this.myForm.value.username,
      this.myForm.value.password,
      'Buyer',
      this.myForm.value.correo,
      this.myForm.value.estat,
      this.myForm.value.sexe,
      this.myForm.value.info,
      this.myForm.value.checkcondicions
    );
    // Call service for validate login
    this.serviceUser.registerUser(this.registerUserData)
    this.result = "Register successfuly";
  }
}
