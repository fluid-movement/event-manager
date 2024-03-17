import { PropsWithChildren, ReactNode } from "react";
import { Box, Container } from "@radix-ui/themes";
import { User } from "@/types/types";

export default function Authenticated({
    user,
    header,
    children,
}: PropsWithChildren<{ user: User; header?: ReactNode }>) {
    return (
        <>
            <Container size="3" px="4">
                <header className="bg-white shadow">
                    <Box className="max-w-7xl mx-auto py-6">{header}</Box>
                </header>

                {children}
            </Container>
        </>
    );
}
