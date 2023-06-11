using static System.Console;
using System;
using System.Linq;
using System.Text.RegularExpressions;
using System.Collections.Generic;

internal class Program
{
    private static void Main()
    {
        foreach (var item in Solution("abcdef"))
        {
            Write($"{item} ");
        }
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
    private static string[] Solution(string str)
    {
        if (str.Length % 2 != 0)
        {
            str += "_";
        }

        var res = new List<string>();
        var count = 2;
        for (int i = 0; i < str.Length; i += count)
        {
            res.Add(str.Substring(i, count));
        }
        return res.ToArray();
    }
}