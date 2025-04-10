import { createContext, useContext, useState, ReactNode } from "react";

type User = {
    [key: string]: any;
};

interface StateContextType {
    user: User | null;
    token: string | null;
    setUser: (user: User | null) => void;
    setToken: (token: string | null) => void;
}

export const StateContext = createContext<StateContextType>({
    user: null,
    token: null,
    setUser: () => {},
    setToken: () => {},
});

export const ContextProvider = ({ children }: { children: ReactNode }) => {
    const [user, setUser] = useState<User | null>(null);
    const [token, _setToken] = useState<string | null>(
        localStorage.getItem("ACCESS_TOKEN")
    );

    const setToken = (token: string | null) => {
        _setToken(token);
        if (token) {
            localStorage.setItem("ACCESS_TOKEN", token);
        } else {
            localStorage.removeItem("ACCESS_TOKEN");
        }
    };

    return (
        <StateContext.Provider value={{ user, token, setUser, setToken }}>
            {children}
        </StateContext.Provider>
    );
};

// 4. Optional: helper hook for cleaner usage
export const useStateContext = () => useContext(StateContext);
