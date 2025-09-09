
class Program {

    public static void Main() {

        // Ex 1

        Console.Write("Veuillez entrer votre nom : ");
        string name = Console.ReadLine();

        Console.Write("Veuillez entrer votre âge : ");
        string age = Console.ReadLine();

        Console.WriteLine(name + " " + age + " ans");

        // Ex 2

        Console.Write("Veuillez entrer le premier nombre : ");
        int number1 = int.Parse(Console.ReadLine());

        Console.Write("Veuillez entrer le second nombre : ");
        int number2 = int.Parse(Console.ReadLine());

        Console.WriteLine($"{number1 + number2} ; {number1 - number2} ; {number1 * number2} ; {number1 / number2}");

        // Ex 3

        Console.Write("Veuillez entrer un  nombre avec une valeur décimale : ");
        double num = double.Parse(Console.ReadLine());

        Console.WriteLine(num.ToString("0.00"));

        // Ex 4

        Console.Write("Veuillez entrer un nombre de jours : ");
        int numberOfDays = int.Parse(Console.ReadLine());

        Console.WriteLine($"{numberOfDays} jours => {numberOfDays * 24} heures = {numberOfDays * 24 * 60} minutes = {numberOfDays * 24 * 60 * 60} secondes");

    }

}