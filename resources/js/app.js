import "./bootstrap";
import "flowbite";
import Cipher from "./services/cipher";

import Alpine from "alpinejs";

window.Alpine = Alpine;
window.Cipher = Cipher;

Alpine.start();
