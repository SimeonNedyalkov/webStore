import { useState } from "react";
import { Menu, X } from "lucide-react";
import { motion } from "framer-motion";

const links = ["Home", "Shop", "About", "Contact"];

export default function Navbar() {
    const [isOpen, setIsOpen] = useState(false);

    return (
        <nav className="w-full shadow-md bg-white dark:bg-gray-900 fixed z-50">
            <div className="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
                {/* Logo */}
                <div className="text-2xl font-bold text-sky-600">webStore</div>

                {/* Desktop Menu */}
                <div className="hidden md:flex gap-8">
                    {links.map((link) => (
                        <a
                            key={link}
                            href={`#${link.toLowerCase()}`}
                            className="text-gray-700 dark:text-gray-200 hover:text-sky-600 dark:hover:text-sky-400 transition"
                        >
                            {link}
                        </a>
                    ))}
                </div>

                {/* Mobile Menu Button */}
                <div className="md:hidden">
                    <button
                        onClick={() => setIsOpen(!isOpen)}
                        className="text-gray-700 dark:text-gray-200"
                    >
                        {isOpen ? <X size={28} /> : <Menu size={28} />}
                    </button>
                </div>
            </div>

            {/* Mobile Menu */}
            {isOpen && (
                <motion.div
                    className="md:hidden flex flex-col items-start px-6 pt-4 pb-6 bg-white dark:bg-gray-900 shadow-md gap-4"
                    initial={{ opacity: 0, y: -20 }}
                    animate={{ opacity: 1, y: 0 }}
                >
                    {links.map((link) => (
                        <a
                            key={link}
                            href={`#${link.toLowerCase()}`}
                            className="text-gray-700 dark:text-gray-200 text-lg hover:text-sky-600 dark:hover:text-sky-400 transition"
                            onClick={() => setIsOpen(false)}
                        >
                            {link}
                        </a>
                    ))}
                </motion.div>
            )}
        </nav>
    );
}
