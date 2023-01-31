import { Component } from '@angular/core';

//decorador Component: ens diu quins arxius formen una component
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',//és la vista de la component
  styleUrls: ['./app.component.css'] //format css a la meva component
})

//es una classe
export class AppComponent {
  //propietats
  title:string = 'my-appbio';
  nom:string ="Pedro Ramirez";
  edat:number=16;
  colors:string[]=["blau","verd","rosa","gris","negre","blanc"]
  sous:number[]=[1560,1908,2345]
  actiu:boolean=true;
  cognom:string=""

  esActiu(){
    if(this.actiu){
      return "Aquest treballador està en actiu"

    }else{
      return "Aquest treballador no treballa amb nosaltres"
    }
  }
  increment(){
    this.edat++;
  }
  decrement(){
    this.edat--;
  }


}
