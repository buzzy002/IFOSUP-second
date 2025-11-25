#set page(
  fill: rgb("#1e1e1e")
)

#set text(
  fill: rgb("#e0e0e0"),
  font: "New Computer Modern",
  size: 11pt
)

#let exemple(body) = block(
  fill: rgb("#2d2d2d"),
  stroke: 1pt + rgb("#4a4a4a"),
  inset: 12pt,
  radius: 6pt,
  width: 100%,
  [
    #text(fill: rgb("#58a6ff"), weight: "bold")[💡 Exemple :]
    #v(0.5em)
    #body
  ]
)


= Cours 1
== Intro

Les ensembles {} sont des listes dans lesquelles l'ordre n'a pas d'importance ${e_1, e_2, e_3} = {e_2, e_1, e_3}$

Les tuples () sont des listes dans lesquelles l'ordre a de l'importance $(e_1, e_2, e_3) != (e_2, e_1, e_3)$

Les matrices sont des tableaux avec n lignes et p colonnes. Elles sont notées $M_(n,p)$

Tenseur est le terme général: 
- Vecteur est un tenseur de dimension 1
- Matrice est un tenseur de dimension 2


== Opérations sur les matrices
=== Identité ou égalité de deux matrices

Deux matrices A et B sont égales ssi elles sont de même taille n x p et sont telles que $A_(i j) = B_(i j)$ pour tout $i in {1,...,n}$ et $j in {1,...,p}$


=== Addition et soustraction de matrices

\u{26A0} les matrices doivent être de même taille
Pour additioner/soustraire deux matrices, on additionne/soustrait les éléments avec le même indice entre eux


=== Produit d'une matrice par un scalaire
Pour multiplier une matrice par un scalaire, on multiplie chaque élément de la matrice par ce scalaire


=== Matrice opposée

Pour avoir l'opposée d'une matrice, on mutliplie la matrice par -1


=== Produit de deux matrices

Pour multiplier les matrices A et B, il faut que A ait le même nombre de colonne que B ait de lignes.
On additionne ensuite le produit de chaque élément de la ligne de A et de la colonne de B.

#exemple[
  Pour trouver $c_(1 1)$, on va additionner le produit chaque élément de la ligne 1 de A et de la colonne 1 de B
]