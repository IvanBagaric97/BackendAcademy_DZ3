<?php

require_once("./htmlLibrary.php");

$html = new HTMLHtmlElement();

$head = new HTMLHeadElement();
$body = new HTMLBodyElement();
$title = new HTMLTitleElement("2.zadatak");
$meta = new HTMLMetaElement("utf-8");
$head -> add_child($title);
$head -> add_child($meta);
$div = new HTMLDivElement();
$p = new HTMLPElement();
$tekst = new HTMLTextNode("SofaScore: web, iOS i Android.");
$p -> add_child($tekst);
$div -> add_child($p);
$div -> add_attribute(new HTMLAttribute('class', 'omotac'));
$body -> add_child($div);
$table = new HTMLTableElement();
$table -> add_attribute(new HTMLAttribute("border", "2px solid black"));
$table -> add_row(new HTMLRowElement([new HTMLCellElement(new HTMLTextNode("Ivan"))]));
$table -> add_row(new HTMLRowElement([new HTMLCellElement(new HTMLTextNode("Bagaric"))]));
$body -> add_child($table);

$form = new HTMLFormElement();

$label = new HTMLLabelElement();

$label -> add_child(new HTMLTextNode("Ime: "));

$a = new HTMLInputElement();
$a -> add_attribute(new HTMLAttribute("type", "text"));

$label -> add_child($a);
$form -> add_child($label);

$body -> add_child($form);

$html -> add_children(new HTMLCollection([$head, $body]));

echo $html;