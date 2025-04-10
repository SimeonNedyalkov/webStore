import { Checkbox, Field, Label } from "@headlessui/react";
import { useState } from "react";
import googleIco from "../assets/signupwith/google-logo-search-new-svgrepo-com.svg";
import facebookIco from "../assets/signupwith/facebook-1-svgrepo-com.svg";
import instagramIco from "../assets/signupwith/instagram-svgrepo-com.svg";
import useForm from "../hooks/useForm";
// import usersAPI from "../../services/usersAPI";
import { useNavigate } from "react-router-dom";
// import { useAuthContext } from "../../contexts/UserContext";

const initialValues = { email: "", password: "" };

export default function Login() {
    const [enabled, setEnabled] = useState(false);
    const [error, setError] = useState("");
    const navigate = useNavigate();
    // const { changeAuthState } = useAuthContext();

    // const { values, submitHandler, changeHandler } = useForm(initialValues, async () => {
    //     const { email, password } = values;
    //     try {
    //         const accessToken = await usersAPI.login(email, password);
    //         if (!accessToken) throw new Error("Login failed: Invalid credentials.");

    //         const userStatus = await usersAPI.getStatus(accessToken);
    //         const userData = await userStatus.json();

    //         const updatedAuthState = {
    //             user: {
    //                 email: userData.email,
    //                 _id: userData._id,
    //                 accessToken,
    //             },
    //         };

    //         changeAuthState(updatedAuthState);
    //         navigate("/");
    //     } catch (err) {
    //         setError(err.message || "Something went wrong. Please try again.");
    //     }
    // });

    return (
        <div className="loginForm min-h-screen flex items-center justify-center bg-gray-50 p-6">
            <div className="formWrapper w-full max-w-md bg-white shadow-xl rounded-2xl p-8">
                {/* <form className="flex flex-col space-y-4" onSubmit={submitHandler}> */}
                <form className="flex flex-col space-y-4">
                    <h1 className="text-3xl font-bold text-sky-950">
                        Login to your account
                    </h1>
                    <p className="text-sm text-gray-600">
                        Welcome back to webStore
                    </p>

                    {error && (
                        <div className="text-red-500 text-sm font-medium">
                            {error}
                        </div>
                    )}

                    {/* Email */}
                    <div className="flex flex-col">
                        <label
                            htmlFor="email"
                            className="text-sm font-medium text-gray-700"
                        >
                            Email Address
                        </label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            placeholder="example@email.com"
                            // onChange={changeHandler}
                            className="styledInput mt-1 px-3 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-200"
                        />
                    </div>

                    {/* Password */}
                    <div className="flex flex-col">
                        <label
                            htmlFor="password"
                            className="text-sm font-medium text-gray-700"
                        >
                            Password
                        </label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            placeholder="Your Password"
                            // onChange={changeHandler}
                            className="styledInput mt-1 px-3 py-2 border rounded-md shadow-sm focus:ring focus:ring-blue-200"
                        />
                    </div>

                    {/* Remember Me / Forgot */}
                    <div className="flex items-center justify-between text-sm text-gray-600">
                        <Field className="flex items-center gap-2">
                            <Checkbox
                                checked={enabled}
                                onChange={setEnabled}
                                className="group block size-4 rounded border bg-white data-[checked]:bg-blue-500"
                            >
                                <svg
                                    className="stroke-white opacity-0 group-data-[checked]:opacity-100"
                                    viewBox="0 0 14 14"
                                    fill="none"
                                >
                                    <path
                                        d="M3 8L6 11L11 3.5"
                                        strokeWidth={2}
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                    />
                                </svg>
                            </Checkbox>
                            <Label>Remember me</Label>
                        </Field>
                        <a href="#" className="text-blue-600 hover:underline">
                            Forgot password?
                        </a>
                    </div>

                    {/* Submit Button */}
                    <div className="pt-4">
                        <button
                            type="submit"
                            className="loginBtn w-full py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-200"
                        >
                            Login
                        </button>
                    </div>

                    {/* Divider */}
                    <div className="divider flex items-center gap-4 py-4 text-sm text-gray-500">
                        <hr className="flex-grow border-gray-300" />
                        <span>or sign up with</span>
                        <hr className="flex-grow border-gray-300" />
                    </div>

                    {/* Social Login Icons (commented out but styled) */}
                    <div className="flex flex-row justify-between">
                        <img src={facebookIco} alt="" width={40} height={40} />
                        <img src={googleIco} alt="" width={40} height={40} />
                        <img src={instagramIco} alt="" width={40} height={40} />
                    </div>
                </form>
            </div>
        </div>
    );
}
