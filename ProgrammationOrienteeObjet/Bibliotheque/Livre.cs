namespace Bibliotheque {

    class Livre {

        string Titre;
        string Auteur;
        string AnneePublication;

        public Livre(string titre, string auteur, string anneePublication) {

            Titre = titre;
            Auteur = auteur;
            AnneePublication = anneePublication;

        }

        public void AfficherInfo() {

            Console.WriteLine($"{Titre} de {Auteur} publié en {AnneePublication}");

        }

    }

}

