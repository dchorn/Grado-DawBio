from turtle import *
import turtle_parts
import math_functions
import menu
import turtle
import sol_mercuri
import venus_terra_mart
import jupiter_saturn

x, y = 0, 0;
bgcolor("royalblue")

# Size of the pen, Speed
turtle_parts.turtle_conf(5, 0)

menu.menu_bg()
menu.menu_rectangle()
menu.draw_menu(-75, 200, 4, ["TORTUGA", "ESPIRAL", "SPACE", "CERRAR"])
menu.btn_press(x, y)
onscreenclick(menu.btn_press, 1)
listen()
done()
