class Program {

    public static void Main() {

        // Ex Collections 1
        List<int> primeNumbersExCol1 = new List<int>();
        int countExCol1 = 1;
        Console.Write("Veuillez écrire un nombre : ");
        int userInputExCol1 = int.Parse(Console.ReadLine() ?? "0");
        if (userInputExCol1 > 2) primeNumbersExCol1.Add(2);
        while (countExCol1 < userInputExCol1) {

            if (isPrime(countExCol1)) primeNumbersExCol1.Add(countExCol1);

            countExCol1 += 2;

        }
        Console.WriteLine(string.Join(", ", primeNumbersExCol1));

        // Ex Collections 2
        List<int> primeNumbersExCol2 = new List<int>();
        Console.Write("Veuillez écrire un nombre : ");
        int countExCol2 = 0;
        int userInputExCol2 = int.Parse(Console.ReadLine() ?? "0");
        if (userInputExCol2 == 1) primeNumbersExCol2.Add(2);
        else if (userInputExCol2 > 1) {

            primeNumbersExCol2.Add(2);
            for (int i = 3; i < userInputExCol2 * userInputExCol2; i += 2) {

                if (countExCol2 == userInputExCol2) break;
                if (isPrime(i)) {

                    primeNumbersExCol2.Add(i);
                    countExCol2++;

                }

            }

        }

        Console.WriteLine(string.Join(", ", primeNumbersExCol2));

    }

    public static bool isPrime(int number) {

        if (number <= 1) return false;
        if (number == 2) return true;
        if (number % 2 == 0) return false;

        for (int i = 3; i * i <= number; i += 2) {

            if (number % i == 0) return false;

        }

        return true;

    }

    // Ex Structures 1
    struct Celsius {

        double temperature;

        public Celsius(double temp) { temperature = temp; }

        public Farenheit convertToFarenheit() { return new Farenheit(temperature * 9 / 5 + 32); }

    }

    struct Farenheit {

        double temperature;

        public Farenheit(double temp) { temperature = temp; }

        public Celsius convertToCelsius() { return new Celsius((temperature - 32) / 9 * 5); }

    }

    // Ex Enumerations 1
    enum Marque {
        Peugeot,
        Renault,
        Citroen,
        BMW,
        Mercedes
    }

    enum Couleur {
        Rouge,
        Bleu,
        Noir,
        Blanc,
        Gris
    }

    enum TypeCarburant {
        Essence,
        Diesel,
        Electrique,
        Hybride
    }

    enum Transmission {
        Manuelle,
        Automatique
    }

    struct Voiture {
        public Marque marque;
        public string modele;
        public Couleur couleur;
        public TypeCarburant carburant;
        public Transmission transmission;
        public int annee;
        public int vitesse;
        public float kilometrage;

        public Voiture(Marque marque, string modele, Couleur couleur, TypeCarburant carburant, Transmission transmission, int annee) {
            this.marque = marque;
            this.modele = modele;
            this.couleur = couleur;
            this.carburant = carburant;
            this.transmission = transmission;
            this.annee = annee;
            this.vitesse = 0;
            this.kilometrage = 0f;
        }

        public void rouler(int vitesse, int second) {

            this.vitesse = vitesse;
            kilometrage += this.vitesse * 3600 * second;

        }
    }
}