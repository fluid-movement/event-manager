import { PropsWithChildren, ReactNode } from "react";
import { Box } from "@radix-ui/themes";
export default function Authenticated({
    user,
    header,
    children,
}: PropsWithChildren<{ user: App.Models.User; header?: ReactNode }>) {
    return (
        <>
            <header className="bg-white shadow">
                <Box className="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {header}
                </Box>
            </header>

            {children}
        </>
    );
}
