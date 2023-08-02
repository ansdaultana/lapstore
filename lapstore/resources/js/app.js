import './bootstrap';
import { Datepicker, Input, initTE } from "tw-elements";
import Alpine from 'alpinejs';
import {Carousel,} from "tw-elements";
initTE({ Datepicker, Input,Carousel });
window.Alpine = Alpine;

Alpine.start();
