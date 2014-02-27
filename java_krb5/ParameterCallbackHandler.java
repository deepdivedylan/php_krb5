import java.io.IOException;

import javax.security.auth.callback.Callback;
import javax.security.auth.callback.CallbackHandler;
import javax.security.auth.callback.NameCallback;
import javax.security.auth.callback.PasswordCallback;
import javax.security.auth.callback.UnsupportedCallbackException;

public class ParameterCallbackHandler implements CallbackHandler
{
	protected String username;
	protected String password;

	public ParameterCallbackHandler(String newUsername, String newPassword)
	{
		setPassword(newPassword);
		setUsername(newUsername);
	}

	public String getPassword()
	{
		return(password);
	}

	public void setPassword(String newPassword)
	{
		password = newPassword;
	}

	public String getUsername()
	{
		return(username);
	}

	public void setUsername(String newUsername)
	{
		username = newUsername;
	}

	public void handle(Callback[] callbacks) throws IOException, UnsupportedCallbackException
	{
		for(Integer i = 0; i < callbacks.length; i++)
		{
			if(callbacks[i] instanceof NameCallback)
			{
				if(username == null || username.length() == 0)
				{
					throw(new IOException("Username cannot be blank"));
				}

				NameCallback nameCallback = (NameCallback)callbacks[i];
				nameCallback.setName(username);
			}
			else if(callbacks[i] instanceof PasswordCallback)
			{
				if(password == null || password.length() == 0)
				{
					throw(new IOException("Password cannot be blank"));
				}

				PasswordCallback passwordCallback = (PasswordCallback)callbacks[i];
				passwordCallback.setPassword(password.toCharArray());

			}
			else
			{
				throw(new UnsupportedCallbackException(callbacks[i], "is not a supported callback"));
			}
		}
	}
}
