namespace Bibliotheque.Utilisateurs {

    class Etudiant {

        string Nom;
        string Prenom;
        List<Livre> listLivres;

        public Etudiant(string nom, string prenom) {

            Nom = nom;
            Prenom = prenom;
            listLivres = new List<Livre>();

        }

        public void AfficherInfo() {

            Console.WriteLine($"{Nom} {Prenom} a emprunté : {listLivresToString()}");

        }

        private string listLivresToString() {

            return string.Join(", ", listLivres);

        }

    }

}