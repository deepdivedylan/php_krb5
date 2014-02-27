import java.util.Set;

import javax.security.auth.Subject;
import javax.security.auth.kerberos.KerberosPrincipal;

public class KerberosUserTest
{
	public static void main(String[] argv)
	{
		try
		{
			String principalName = "testlala@STUDENTS.DEEPDIVECODERS.COM";
			String password      = "footest";
			String configFile    = "KerberosLogin.conf";

			KerberosUser user = new KerberosUser(principalName, password, configFile);
			user.login();
			Subject subject = user.getSubject();
			Set<KerberosPrincipal> kerberosPrincipals = subject.getPrincipals(KerberosPrincipal.class);
			
			for(KerberosPrincipal principal : kerberosPrincipals)
			{
				System.out.println("Name : " + principal.getName());
				System.out.println("Realm: " + principal.getRealm());
			}
		}
		catch(Exception e)
		{
			e.printStackTrace();
		}
	}
}
