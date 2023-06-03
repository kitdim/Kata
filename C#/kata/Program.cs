using static System.Console;
internal class Program
{
    private static void Main()
    {
        var res = validBraces("()");
        WriteLine("() -> " + res);

        res = validBraces("[(])");
        WriteLine("[(]) -> " + res);

        res = validBraces("(){}[]");
        WriteLine("(){}[] -> " + res);

        res = validBraces("([{}])");
        WriteLine("([{}]) -> " + res);

        res = validBraces("(}");
        WriteLine("(} -> " + res);

        res = validBraces("[({})](]");
        WriteLine("[({})](] -> " + res);

        res = validBraces("(}})");
        WriteLine("(}}) -> " + res);

        res = validBraces("(");
        WriteLine("( -> " + res);

        res = validBraces("[[(]])");
        WriteLine("[[(]]) -> " + res);

        res = validBraces("())");
        WriteLine("(() -> " + res);

        res = validBraces("((((())))}");
        WriteLine("((((())))} -> " + res);

        res = validBraces("()))");
        WriteLine("())) -> " + res);
    }
    private static bool validBraces(string braces)
    {
        if (braces.Length < 2 ||
            braces.Length % 2 != 0)
        {
            return false;
        }

        var size = braces.Length;
        var res = new Stack<char>();

        for (var i = 0; i < size; i++)
        {
            if (braces[i] == '(' || braces[i] == '{' || braces[i] == '[')
            {
                res.Push(braces[i]);
                continue;
            }

            if (res.Count == 0)
            {
                return false;
            }

            if (res.Peek() == '(' && braces[i] == ')' ||
                res.Peek() == '[' && braces[i] == ']' ||
                res.Peek() == '{' && braces[i] == '}')
            {
                res.Pop();
                continue;
            }
            if (res.Peek() != braces[i])
            {
                return false;
            }
        }

        if (res.Count == 0)
        {
            return true;
        }

        return false;
    }
}