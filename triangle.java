import java.io.*;
public class triangle {
    public static void main(String args[]) throws IOException {
        String next="";
        do {
            System.out.println("三角形的判別:");
            BufferedReader br=new BufferedReader(new InputStreamReader(System.in));
            System.out.print("請輸入三角形的第一個邊長：");
            String str1=br.readLine();
            System.out.print("請輸入三角形的第二個邊長：");
            String str2=br.readLine();
            System.out.print("請輸入三角形的第三個邊長：");
            String str3=br.readLine();


            int A=Integer.parseInt(str1);//將3個輸入的值分別轉換成整數,並分別指定給A,B,C
            int B=Integer.parseInt(str2);
            int C=Integer.parseInt(str3);


            try {
            if ((A==0||B==0||C==0))
                System.out.println("這不是三角形!!");
            if(A+B<C||A+C<B||B+C<A)
                System.out.println("這不是三角形!!");
            }


            if((A==B)&&(B==C)&&(A==C))
                System.out.println("這是一個正三角形");
            else 
            if(((A==B)||(B==C)||(A==C))&&((A*A+B*B==C*C)||(C*C+B*B==A*A)||(A*A+C*C==B*B)))
                System.out.println("這是一個等腰直角三角形");
            else
            if((A==B)||(B==C)||(A==C))
                System.out.println("這是一個等腰三角形");
            else
            if((A*A)==(C*C)+(B*B)||(B*B)==(A*A)+(C*C)||(C*C)==(A*A)+(B*B))
                System.out.println("這是一個直角三角形");
            else
            if ((A*A)>(B*B)+(C*C) || (B*B)>(A*A)+(B*B) || (C*C)>(A*A)+(B*B))
                System.out.println("這是一個鈍角三角形");
            else
                System.out.println("這是一個銳角三角形");


            try {
                System.out.print("是否繼續(Y/N)?");
                next=br.readLine();
            }

            catch (IOException e) {
                System.exit(-1);
            }

        }

        while (next.equalsIgnoreCase("y"));

    }
}