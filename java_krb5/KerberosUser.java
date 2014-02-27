import javax.security.auth.login.LoginContext;
import javax.security.auth.login.LoginException;
import javax.security.auth.kerberos.KerberosPrincipal;
import javax.security.auth.Subject;

public class KerberosUser
{
	protected Boolean      loggedIn;
	protected LoginContext loginContext;

	public KerberosUser(String newPrincipalName, String newPassword, String newLoginFile) throws LoginException
	{
		loggedIn = false;
		System.setProperty("java.security.auth.login.config", newLoginFile);
		loginContext = new LoginContext("KerberosLogin", new ParameterCallbackHandler(newPrincipalName, newPassword));
	}

	public void login() throws LoginException
	{
		loginContext.login();
		loggedIn = true;
	}

	public Boolean isLoggedIn()
	{
		return(loggedIn);
	}

	public Subject getSubject() throws LoginException
	{
		if(!loggedIn)
		{
			throw(new LoginException("User is not logged in"));
		}

		return(loginContext.getSubject());
	}
}
