class Program {
    public static void Main() {

        // Ex 1
        Console.Write("Veuillez saisir un nombre : ");
        int userInputEx1 = int.Parse(Console.ReadLine());
        userInputEx1 *= 2;
        string userInputEx1ToString = userInputEx1.ToString();
        Console.WriteLine(userInputEx1ToString);

        // Ex 2
        Console.Write("Veuillez saisir un nombre : ");
        float userInputEx2 = float.Parse(Console.ReadLine());
        int userInputEx2ToInt = Convert.ToInt32(userInputEx2);
        Console.WriteLine(userInputEx2ToInt);

        // Ex 3
        Console.Write("Veuillez saisir une températeur (en °C) : ");
        float userInputEx3 = float.Parse(Console.ReadLine());
        float userInputEx3ToFarenheit = userInputEx3 * 9 / 5 + 32;
        Console.WriteLine($"{userInputEx3} °C = {userInputEx3ToFarenheit} °F");

    }
}