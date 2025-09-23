using System.Text;
using BenchmarkDotNet.Attributes;
using BenchmarkDotNet.Running;

class Program {

    public static void Main() {

        // Exercices conditionnelles
        // Ex 1
        Console.Write("Veuillez entrer un int : ");
        int userInputEx1 = int.Parse(Console.ReadLine());
        if (userInputEx1 % 2 == 0) {
            Console.WriteLine("Le nombre est paire");
        }
        else {
            Console.WriteLine("Le nombre est impaire");
        }


        // Exercices conditionnelles
        // Ex 2
        Console.Write("Veuillez entrer un opérateur (+, -, /, *) : ");
        string userInputEx2 = Console.ReadLine();
        Console.Write("Veuillez entrer deux nombres : ");
        float userNum1 = float.Parse(Console.ReadLine());
        float userNum2 = float.Parse(Console.ReadLine());

        float? answer = null;
        switch (userInputEx2) {
            case "+":
                answer = userNum1 + userNum2;
                break;
            case "-":
                answer = userNum1 - userNum2;
                break;
            case "*":
                answer = userNum1 * userNum2;
                break;
            case "/":
                if (userNum1 == 0.0 || userNum2 == 0.0) {
                    Console.WriteLine("Division par 0, le programme va s'arrêter");
                    break;
                }
                answer = userNum1 / userNum2;
                break;
            default:
                break;
        }

        if (answer == null) {
            Console.WriteLine("Opérateur non reconnu");
        }
        else {
            Console.WriteLine($"La réponse est {answer}");
        }

        // Exercices Opérateur
        // Ex 1
        Console.Write("Veuillez entrer un BBAN : ");
        string BBAN = Console.ReadLine();
        double firstTenDigit = double.Parse(BBAN[0..10]);
        double lastTwoDigit = double.Parse(BBAN[^2..]);
        if (firstTenDigit % 97 == lastTwoDigit || (firstTenDigit % 97 == 0 && lastTwoDigit == 97)) {
            Console.WriteLine("True");
        }
        else {
            Console.WriteLine("False");
        }

        // Exercices boucles
        // Ex 1
        int sum = 0;
        for (int i = 0; i < 100; i += 2) { sum++; }

        Console.WriteLine(sum);

        // Ex 2
        Console.Write("Veuillez donner un nombre : ");
        int number = int.Parse(Console.ReadLine());
        int factorial = 1;

        while (number > 0) {
            factorial *= number;
            number--;
        }

        Console.WriteLine(factorial);

        // Ex 3
        Console.Write("Veuillez saisir un nombre : ");
        int userNumber = int.Parse(Console.ReadLine());
        for (int i = 1; i < 11; i++) {
            Console.WriteLine(userNumber * i);
        }

        // Exercices tableau
        // Ex 1
        int[] table = [1, 2, 3, 4, 5, 6];
        int sum2 = 0;
        foreach (int val in table) {
            sum2 += val;
        }
        float moy = (float)sum2 / table.Length;
        Console.WriteLine(moy);

        // Ex 2
        int[] table2 = [5, 3, 1, 10];
        int min = table2[0];
        int max = table2[0];
        foreach (int val in table2) {
            if (val > max) max = val;
            if (val < min) min = val;
        }
        Console.WriteLine($"min : {min} & max : {max}");

        // Ex 3
        int[,] matrice = new int[10, 10];
        for (int i = 0; i < 10; i++) {
            for (int j = 0; j < 10; j++) {
                matrice[i, j] = (i * 10) + j + 1;
                Console.Write($"{matrice[i, j]} ");
            }
            Console.WriteLine();
        }

    }

    int AdditionnerNombresPairs(uint number) {

            int sum = 0;
            for (int i = 0; i < number; i += 2) {
                sum += i;
            }
            return sum;

        }

    bool EstPalindrome(string word) {

        StringBuilder stringbuilder = new StringBuilder();
        for (int i = word.Length - 1; i < -1; i--) {
            stringbuilder.Append(word[i]);
        }
        return word == stringbuilder.ToString();

    }

}